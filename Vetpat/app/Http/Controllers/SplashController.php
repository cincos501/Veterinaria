<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SplashController extends Controller
{
    public function showSplash()
{
    return view('splash');
}
}
