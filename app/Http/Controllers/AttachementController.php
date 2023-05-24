<?php

namespace App\Http\Controllers;

use App\Models\Attachement;
use App\Models\marche;
use App\Models\Prixe;
use App\Models\QuantiteExecute;
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
    public function create($marche)
    {
        $index =0;
        $prixList = Prixe::where('marche', $marche)->get();
        return response()->view('attachements.add', compact('marche', 'index', 'prixList'))->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $marche)
    {
        // -----------------------------------
//        $this->validate($request,[
//            'numero' => 'required|numeric|max:50|unique:attachements,numero',
//            'date' => 'required|date|max:50',
//            'montant_de_revision' => 'required|numeric|max:50',
//        ]);
//
//        // new added
//        $attachement = new Attachement();
//        $attachement->numero = $request->numero;
//        $attachement->date = $request->date;
//        $attachement->montant_de_revision = $request->montant_de_revision;
//        $attachement->marche = $marche;
//        $attachement->save();
//

        $request->validate([
            'date' => 'required|date',
            'numero' => 'required|numeric',
            'montant_de_revision' => 'required|numeric',
            'quantities' => 'required|array',
            'quantities.*.prix' => 'required',
            'quantities.*.quantite' => 'required|numeric',
        ]);

        // Store the attachment
        $attachement = Attachement::create([
            'date' => $request->input('date'),
            'numero' => $request->input('numero'),
            'montant_de_revision' => $request->input('montant_de_revision'),
            'marche' => $marche
        ]);

        // Store the quantities executed
        $quantities = $request->input('quantities');
        foreach ($quantities as $quantity) {
            QuantiteExecute::create([
                'attachement' => $attachement->id,
                'prix' => $quantity['prix'],
                'quantite' => $quantity['quantite'],
            ]);
        }


        //Attachement::create($request->except('_token'));
        return redirect('marche/'.$marche)->with(['success'=>'Attachement added successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        // -----------------------------------

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attachement = Attachement::findOrFail($id);
        $quantite_execute=QuantiteExecute::where('attachement', $id)->get();
        return response()->view('attachements.show', ['attachement' => $attachement,'quantite_execute' => $quantite_execute ])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
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
