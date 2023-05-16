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
        return view("concurrent")->with([
            'concurrent' => $concurrent
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($appel_id)
    {
        return view('concurrents.add', compact('appel_id'));
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
            'appeloffre_id' => 'required',
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
        return redirect('/appeloffre/'.$request->appeloffre_id)->with(['success'=>'Concurrent added successfully.']);
        // -----------------------------------

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $concurrent = Concurrent::findOrFail($id);

        return view('concurrents.show', ['concurrent' => $concurrent]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $concurrent = Concurrent::findOrFail($id);
        return view('concurrents.edit')->with([
            'concurrent' => $concurrent,
        ]);
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
        return redirect()->route('concurrent')->with(['success'=>'Concurrent updated successfully.']);
        // -----------------------------------
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $concurrent = Concurrent::findOrFail($id);
        $appel=appeloffre::where('id', '=', $concurrent->appel_doffre)->first();
        if($appel!=null){
            $concurrent->delete();
            return redirect()->route('concurrent')->with(['success'=>'Concurrent deleted successfully.']);
        }else{
            return redirect()->route('concurrent')->with(['fail'=>'mimknch hit mrtabt b appel doffre']);
        }


    }
}
