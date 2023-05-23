<?php

namespace App\Http\Controllers;

use App\Models\marche;
use App\Models\Prixe;
use Illuminate\Http\Request;

class PrixController extends Controller
{
    public function myListe()
    {
        $prix = Prixe::all();
        return response()->view("prix")->with([
            'prix' => $prix
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($marche)
    {
        return response()->view('prix.add', compact('marche'))->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $marche_id)
    {

        // -----------------------------------
        $this->validate($request,[
            'numero' => 'required|max:50',
            'designation' => 'required|max:50',
            'quantite' => 'required|max:50',
            'unite' => 'required|max:50',
            'prix_unitaire' => 'required|max:50',
            'categorie_prix' => 'required|max:50',
        ]);

        // new added
        $prix = new Prixe();
        $prix->numero = $request->numero;
        $prix->designation = $request->designation;
        $prix->quantite = $request->quantite;
        $prix->unite = $request->unite;
        $prix->prix_unitaire = $request->prix_unitaire;
        $prix->categorie_prix = $request->categorie_prix;
        $prix->marche = $marche_id;
        $prix->save();

        return redirect('marche/'.$marche_id)->with(['success'=>'prix added successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        // -----------------------------------

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prix = Prixe::findOrFail($id);
        return response()->view('prix.show', ['prix' => $prix])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $prix = Prixe::findOrFail($id);
        return response()->view('prix.edit', ['prix' => $prix])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }




    public function update(Request $request, $id)
    {

        // -----------------------------------
        $prix = Prixe::findOrFail($id);
        $validatedData = $request->validate([
            'numero' => 'required',
            'designation' => 'required',
            'quantite' => 'required',
            'prix_unitaire' => 'required',
            'categorie_prix' => 'required',// D'apres la Table Categorie Prixe
        ]);

        //Flexible Way
        $prix->numero = $validatedData['numero'];
        $prix->designation = $validatedData['designation'];
        $prix->quantite = $validatedData['quantite'];
        $prix->prix_unitaire = $validatedData['prix_unitaire'];
        $prix->categorie_prix = $validatedData['categorie_prix'];

        $prix->save();
        return redirect('marche/'.$prix->marche)->with(['success'=>'prix updated successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        // -----------------------------------
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $prix = Prixe::findOrFail($id);
        $id_marche=$prix->marche;
        $prix->delete();
        return redirect('marche/'.$id_marche)->with(['success'=>'prix updated successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }
}
