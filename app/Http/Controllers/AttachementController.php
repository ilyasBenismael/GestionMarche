<?php

namespace App\Http\Controllers;

use App\Models\Attachement;
use App\Models\marche;
use Illuminate\Http\Request;

class AttachementController extends Controller
{
    public function myListe()
    {
        $attachement = Attachement::all();
        return response()->view("attachement")->with([
            'attachement' => $attachement
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($marches_id)
    {
        return response()->view('attachements.add', compact('marches_id'))->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $marches_id)
    {

        // -----------------------------------
        $this->validate($request,[
            'numero' => 'required|numeric|max:50|unique:attachements,numero',
            'marche' => 'required|string|max:50',
            'date' => 'required|date|max:50',
            'montant_de_revision' => 'required|numeric|max:50',
            'marche_id' => 'required|exists:marches,id',
        ]);

        // new added
        $attachement = new Attachement();
        $attachement->numero = $request->numero;
        $attachement->date = $request->date;
        $attachement->montant_de_revision = $request->montant_de_revision;
        $attachement->marche = $request->marche_id;
        $attachement->save();


        $marche = marche::find($marches_id);
        $marche->attachement = $attachement->id;
        $marche->save();


        return redirect()->route('marcheList')->with(['success'=>'Attachement added successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        // -----------------------------------

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attachement = Attachement::findOrFail($id);

        return response()->view('attachements.show', ['attachement' => $attachement])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $attachement = Attachement::findOrFail($id);
        return response()->view('attachements.edit')->with([
            'attachement' => $attachement,
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }




    public function update(Request $request, string $id)
    {

        // -----------------------------------
        $attachement = Attachement::findOrFail($id);
        $validatedData = $request->validate([
            'numero' => 'required|numeric|max:50|unique:attachements,id,'.$attachement->numero,//check it again
            'marche' => 'required|string|max:50',
            'date' => 'required|date|max:50',
            'montant_de_revision' => 'required|numeric|max:50',
        ]);

        //Flexible Way
        $attachement->numero = $validatedData['numero'];
        $attachement->marche = $validatedData['marche'];
        $attachement->date = $validatedData['date'];
        $attachement->montant_de_revision = $validatedData['montant_de_revision'];

        $attachement->save();
        return redirect()->route('attachement')->with(['success'=>'attachement updated successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        // -----------------------------------
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $attachement = Attachement::findOrFail($id);
        $attachement->delete();
        return redirect()->route('attachement')->with(['success'=>'attachement deleted successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }
}
