<?php

namespace App\Http\Controllers;

use App\Models\marche;
use App\Models\Prix;
use Illuminate\Http\Request;

class PrixController extends Controller
{
    public function myListe()
    {
        $prix = Prix::all();
        return response()->view("prix")->with([
            'prix' => $prix
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(marche $marche)
    {
        return response()->view('prix.add', compact('marche'))->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // -----------------------------------
        $this->validate($request,[
            'numero' => 'required|numeric|max:50|unique:prix,nom',
            'designation' => 'required|string|max:50',
            'quantite' => 'required|numeric|max:50',
            'prix_unitaire' => 'required|numeric|max:50',
            'categorie_prix' => 'required|string|max:50',// D'apres la Table Categorie Prix
            'marche_id' => 'required|exists:marche,id',
        ]);

        // new added
        $prix = new Prix();
        $prix->numero = $request->numero;
        $prix->designation = $request->designation;
        $prix->quantite = $request->quantite;
        $prix->prix_unitaire = $request->prix_unitaire;
        $prix->categorie_prix = $request->categorie_prix;
        $prix->marche_id = $request->marche_id;
        $prix->save();

        return redirect()->route('marcheList')->with(['success'=>'prix added successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        // -----------------------------------

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prix = Prix::findOrFail($id);

        return response()->view('prix.show', ['prix' => $prix])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $prix = Prix::findOrFail($id);
        return response()->view('prix.edit')->with([
            'prix' => $prix,
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }




    public function update(Request $request, string $id)
    {

        // -----------------------------------
        $prix = Prix::findOrFail($id);
        $validatedData = $request->validate([
            'numero' => 'required|numeric|max:50|unique:prix,id,'.$prix->numero,//check it again
            'designation' => 'required|string|max:50',
            'quantite' => 'required|numeric|max:50',
            'prix_unitaire' => 'required|numeric|max:50',
            'categorie_prix' => 'required|string|max:50',// D'apres la Table Categorie Prix
            'marche_id' => 'required|exists:marche_id,id',
        ]);

        //Flexible Way
        $prix->numero = $validatedData['numero'];
        $prix->designation = $validatedData['designation'];
        $prix->quantite = $validatedData['quantite'];
        $prix->prix_unitaire = $validatedData['prix_unitaire'];
        $prix->categorie_prix = $validatedData['categorie_prix'];

        $prix->save();
        return redirect()->route('prix')->with(['success'=>'prix updated successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        // -----------------------------------
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $prix = Prix::findOrFail($id);
        $prix->delete();
        return redirect()->route('prix')->with(['success'=>'prix deleted successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }
}
