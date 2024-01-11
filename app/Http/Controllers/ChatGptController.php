<?php

namespace App\Http\Controllers;

use App\Models\DemoIdeaScore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChatGptController extends Controller
{

    public function dict_res(Request $request)
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
        Storage::put('dict.txt', $out_data);
        $pythonPath =  "..\python\genAI.py";
        $out_path =  "C:\Users\m323s\PhpstormProjects\Dashboard-for-evaluate-ideas-with-GenAI\Dashboard\storage\app\dict.txt";

        $command = 'python ' . $pythonPath. ' "' . $out_path . '"';
        // コマンドを実行
        exec($command, $outputs);
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
}
