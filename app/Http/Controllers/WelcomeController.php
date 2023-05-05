<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{


    public function goWelcome()
    {
        return response()->view('welcome')->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }
}
