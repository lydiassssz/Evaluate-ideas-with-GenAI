<?php

namespace App\Http\Controllers;

use App\Models\DemoIdeaScore;
use Illuminate\Http\Request;

class CsvController extends Controller
{


    public function test(){
        return view('test');
    }
    public function save_csv(Request $request){


        $request->validate([
            'data.*.id' => 'required',
            'data.*.problem' => 'required',
            'data.*.solution' => 'required',
        ]);

        $datas = $request->input('data');

        $datas = json_decode($datas,true);

        DemoIdeaScore::truncate();
        // データベースへの一括挿入
        foreach ($datas['data'] as $data){
            DemoIdeaScore::Create($data);
        }

        return response()->json(['message' => 'CSV data saved successfully'], 200);
    }
}
