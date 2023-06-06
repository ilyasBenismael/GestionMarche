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



    public function update(Request $request, $id)
    {
        $appelOffre = AppelOffre::findOrFail($id);

        // Validate the input fields
        $validatedData = $request->validate([
            'numero' => 'required',
            'estimation_globale' => 'required',
            'estimation_detaillee' => '',
            'objet' => 'required',
            'date_douverture_des_plis' => 'required',
        ]);

        // Update the Appel Offre details
        $appelOffre->update($validatedData);

        // Redirect back to the Appel Offre details page
        return redirect()->route('appelOffres.show', $appelOffre->id);
    }



    public function edit($id)
    {
        $appelOffres = AppelOffre::findOrFail($id);

        return view('appelOffres.edit', compact('appelOffres'));
    }



}
