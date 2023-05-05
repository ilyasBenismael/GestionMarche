<?php

namespace App\Http\Controllers;

use App\Models\CategoriePrix;
use Illuminate\Http\Request;

class CategoriePrixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function myListe()
    {
        $categoriePrix = CategoriePrix::all();
        return view("categoriePrix")->with([
            'categoriePrix' => $categoriePrix
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categoriePrix.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // -----------------------------------
        $this->validate($request,[
            'marche' => 'required|string|max:50|unique:categoriePrix,marche',
            'designation'=>'required|string',
        ]);
        CategoriePrix::create($request->except('_token'));
        return redirect()->route('categoriePrix')->with(['success'=>'categoriePrix added successfully.']);
        // -----------------------------------

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoriePrix = CategoriePrix::findOrFail($id);

        return view('categoriePrix.show', ['categoriePrix' => $categoriePrix]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categoriePrix = CategoriePrix::findOrFail($id);
        return view('categoriePrix.edit')->with([
            'categoriePrix' => $categoriePrix,
        ]);
    }




    public function update(Request $request, string $id)
    {

        // -----------------------------------
        $categoriePrix = CategoriePrix::findOrFail($id);
        $validatedData = $request->validate([
            'marche' => 'required|string|max:50|unique:categoriePrix,id,'.$categoriePrix->marche,//check it again
            'designation'=>'required|string',
        ]);

        //To Update Table we Two Methods Simple way
        //$categoriePrix->update($request->except('_token','_method'));
        //Flexible Way
        $categoriePrix->marche = $validatedData['marche'];
        $categoriePrix->designation = $validatedData['designation'];

        $categoriePrix->save();
        return redirect()->route('categoriePrix')->with(['success'=>'categoriePrix updated successfully.']);
        // -----------------------------------
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $categoriePrix = CategoriePrix::findOrFail($id);
        $categoriePrix->delete();
        return redirect()->route('categoriePrix')->with(['success'=>'categoriePrix deleted successfully.']);
    }
}
