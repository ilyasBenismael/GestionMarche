<?php

namespace App\Http\Controllers;

use App\Models\appeloffre;
use Illuminate\Http\Request;

class AppelOffreController extends Controller
{
    // Inside your controller method
    public function show($id)
    {
        $appelOffres = AppelOffre::with('concurrents')->find($id);
        $concurrents = $appelOffres->concurrents;

        return view('appeloffres.show', compact('appelOffres', 'concurrents'));
    }

}
