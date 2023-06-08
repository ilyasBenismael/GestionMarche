<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class EffectController extends Controller
{
    public function effects()
    {
        return response()->view('effects')->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }





}
