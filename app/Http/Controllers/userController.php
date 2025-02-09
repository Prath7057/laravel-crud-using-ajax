<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function submit_data(Request $request)
    {
       
        return view('components.dashboard', ['username' => $request->username])->render();
    }
}
