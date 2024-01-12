<?php

namespace App\Http\Controllers;

use App\Models\DemoIdeaScore;
use Illuminate\Http\Request;

class CsvController extends Controller
{
    public function save_csv(Request $request){
        // バリデーション
        $request->validate([
            'id' => 'required'
        ]);

        $ids = $request->input('id');
        $problems = $request->input('problem');
        $solutions = $request->input('solution');

        foreach([$ids, $problems, $solutions] as [$id, $problem, $solution]){
            $content = DemoIdeaScore::create([$id, $problem, $solution])->save();
        }

        return redirect('dashboard');
    }
}
