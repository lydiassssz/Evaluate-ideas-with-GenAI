<?php

namespace App\Http\Controllers;

use App\Models\DemoIdeaScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        ]);

        // 文章
        $id = $request->input('id');
        $problem = '"'.$request->input('problem').'"';
        $solution = '"'.$request->input('solution').'"';

        $out_data = "{'problem' : " . $problem . ", 'solution' : " . $solution . "}";
        $out_data =  str_replace("\n", '', $out_data);
        $this->prompt_make($out_data, $id);
    }

    //レスポンスをデータベースに保存して元ページにリダイレクト
    public function dict_res($outputs, $id)
    {

        if($outputs[0]){
            $response = Storage::get('generated_data.txt');
            try {
                $responseData = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
                if (empty($responseData['error'])) {
                    $data = DemoIdeaScore::find($id);
                    $data->evidence = $responseData['Evidence']['Score'];
                    $data->evidence_justification = $responseData['Evidence']['Justification'];
                    $data->evidence_detail = $responseData['Evidence']['Evaluation'];
                    $data->impact = $responseData['Impact']['Score'];
                    $data->impact_justification = $responseData['Impact']['Justification'];
                    $data->impact_detail = $responseData['Impact']['Evaluation'];
                    $data->possible = $responseData['Possible']['Score'];
                    $data->possible_justification = $responseData['Possible']['Justification'];
                    $data->possible_detail = $responseData['Possible']['Evaluation'];

                    $data->save();

                    return redirect()->route('details', ['id' => $id]);
                }
                //todo chatGPTがエラーを返した場合の処理記述
            } catch (\JsonException $e) {
            }
        }
    }



    public function prompt_make($out_data, $id)
    {

    }

}
