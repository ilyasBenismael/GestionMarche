<?php

namespace App\Http\Controllers;

use App\Models\appeloffre;
use App\Models\Concurrent;
use Illuminate\Http\Request;

class ConcurrentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function myListe()
    {
        $concurrent = Concurrent::all();
        return response()->view("concurrent")->with([
            'concurrent' => $concurrent
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(AppelOffre $appeloffre)
    {
        return response()->view('concurrents.add', compact('appeloffre'))->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // -----------------------------------
        $this->validate($request,[
            'nom' => 'required|string|max:50|unique:concurrents,nom',
            'ville' => 'required|string|max:50',
            'montant' => 'required|string|max:50',
            'statut' => 'required|string|max:50',
            'appeloffre_id' => 'required|exists:appeloffres,id',
        ]);

        // new added
        $concurrent = new Concurrent();
        $concurrent->nom = $request->nom;
        $concurrent->ville = $request->ville;
        $concurrent->montant = $request->montant;
        $concurrent->statut = $request->statut;
        $concurrent->appeloffres_id = $request->appeloffre_id;
        $concurrent->save();

        //Concurrent::create($request->except('_token'));
        return redirect()->route('marcheList')->with(['success'=>'Concurrent added successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        // -----------------------------------

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $concurrent = Concurrent::findOrFail($id);

        return response()->view('concurrents.show', ['concurrent' => $concurrent])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $concurrent = Concurrent::findOrFail($id);
        return response()->view('concurrents.edit')->with([
            'concurrent' => $concurrent,
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }




    public function update(Request $request, string $id)
    {

        // -----------------------------------
        $concurrent = Concurrent::findOrFail($id);
        $validatedData = $request->validate([
            'nom' => 'required|string|max:50|unique:concurrents,id,'.$concurrent->nom,//check it again
            'ville' => 'required|string|max:50',
            'montant' => 'required|string|max:50',
            'statut' => 'required|string|max:50',
        ]);

        //Flexible Way
        $concurrent->nom = $validatedData['nom'];
        $concurrent->ville = $validatedData['ville'];
        $concurrent->montant = $validatedData['montant'];
        $concurrent->statut = $validatedData['statut'];

        $concurrent->save();
        return redirect()->route('concurrent')->with(['success'=>'Concurrent updated successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
        // -----------------------------------
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $concurrent = Concurrent::findOrFail($id);
        $concurrent->delete();
        return redirect()->route('concurrent')->with(['success'=>'Concurrent deleted successfully.'])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }
}
