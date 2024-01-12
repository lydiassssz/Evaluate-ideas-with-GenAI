<?php

namespace App\Http\Controllers;

use App\Models\DemoIdeaScore;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class ChatGptController extends Controller
{
    //chatGPTに生成命令を送る処理
    public function generate_sen(Request $request)
    {
        // バリデーション
        $request->validate([
            'id' => 'required',
            'problem' => 'required',
            'solution' => 'required',
            'api_key' => 'required',
        ]);

        $api_key = $request->input('api_key');

        // 文章
        $id = $request->input('id');
        $problem = '"'.$request->input('problem').'"';
        $solution = '"'.$request->input('solution').'"';

        $out_data = "{'problem' : " . $problem . ", 'solution' : " . $solution . "}";
        $out_data =  str_replace("\n", '', $out_data);
        $this->observe_chatGPT($out_data, $id, $api_key);
    }

    //レスポンスをデータベースに保存して元ページにリダイレクト
    public function dict_res($res_data, $id)
    {
        if($res_data){
            if (empty($res_data['error'])) {
                $data = DemoIdeaScore::find($id);
                $data->evidence = $res_data['Evidence']['Score'];
                $data->evidence_justification = $res_data['Evidence']['Justification'];
                $data->evidence_detail = $res_data['Evidence']['Evaluation'];
                $data->impact = $res_data['Impact']['Score'];
                $data->impact_justification = $res_data['Impact']['Justification'];
                $data->impact_detail = $res_data['Impact']['Evaluation'];
                $data->possible = $res_data['Possible']['Score'];
                $data->possible_justification = $res_data['Possible']['Justification'];
                $data->possible_detail = $res_data['Possible']['Evaluation'];

                $data->save();

                return redirect()->route('details', ['id' => $id]);
            }
        }
    }


    public function observe_chatGPT($out_data, $id, $api_key){

        //openAI APIエンドポイント
        $endpoint = 'https://api.openai.com/v1/chat/completions';
        $headers  = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $api_key
        );
        $data = array(
            'model' => 'gpt-4',
            'messages' => [
                [
                    "role" => "system",
                    "content" => "日本語で応答してください"
                ],
                [
                    "role" => "user",
                    "content" => $req_question
                ]
            ]
        );


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        for($count=1; $count < 4; $count++){
            $response = curl_exec($ch);
            if ($response){
                try{
                    $res_data =  json_encode($response);
                    if($this->check_key_json($res_data)){
                        $this->dict_res($res_data, $id);
                        break;
                    }
                } catch (\JsonException $e){
                    if($count===3){
                        $res_data = "Error in converting to dictionary";
                    }
                    continue;
                }
            }
        }
    }

    public function check_key_json($res_data): bool
    {
        // 必要なキー
        $required_keys = ['Evidence', 'Impact', 'Possible', 'Score', 'Justification', 'Evaluation'];

        // $res_dataが配列でない場合は即座にFalseを返す
        if (!is_array($res_data)) {
            return false;
        }

        // 必要なキーが全て存在するか確認
        foreach ($required_keys as $key) {
            if (!array_key_exists($key, $res_data)) {
                return false;
            }
        }

        // Scoreの値が1から10の範囲に収まっているか確認
        if (array_key_exists('Score', $res_data)) {
            $score_value = $res_data['Score'];
            if (!is_numeric($score_value) || $score_value < 1 || $score_value > 10) {
                return false;
            }
        }

        // 上記の条件をすべてクリアしたらTrueを返す
        return true;
    }


    public function prompt_make($out_data, $id)
    {

    }

}
