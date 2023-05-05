<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('goProfil');

    }
    public function goProfil()
    {
        return response()->view('profil')->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }
}
