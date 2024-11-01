<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function getSignin()
    {
        return view('signin');
    }

    public function getSignup()
    {
        return view('signup');
    }
}
