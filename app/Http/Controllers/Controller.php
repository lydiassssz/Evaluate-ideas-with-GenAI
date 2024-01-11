<?php

namespace App\Http\Controllers;

use App\Models\DemoIdeaScore;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function top()
    {


        $data = User::all();
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
