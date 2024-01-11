<?php

namespace App\Http\Controllers;

use App\Models\DemoIdeaScore;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function top()
    {

        try {
            DB::connection()->getPdo();
            echo "Connected successfully to database.";
        } catch (\Exception $e) {
            die("Could not connect to the database. Error: " . $e->getMessage());
        }


        $data = DemoIdeaScore::all();
        dd($data);


        return view('dashboard.top', compact('data'));
    }

    public function page($id)
    {
        $data = DemoIdeaScore::find($id);
        return view('dashboard.detail', compact('data'));
    }

    public function wait($id)
    {
        $data = DemoIdeaScore::find($id);

    }

}
