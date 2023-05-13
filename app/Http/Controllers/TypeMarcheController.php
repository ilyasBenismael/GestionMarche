<?php

namespace App\Http\Controllers;

use App\Models\TypeMarche;
use Illuminate\Http\Request;

class TypeMarcheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function myListe()
    {
        $typeMarche = TypeMarche::all();
         return view("typeMarche")->with([
             'typeMarche' => $typeMarche
         ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('typeMarches.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // -----------------------------------
        $this->validate($request,[
           'type' => 'required|string|max:50|unique:typeMarches,type',
        ]);
        TypeMarche::create($request->except('_token'));
        return redirect()->route('typeMarche')->with(['success'=>'TypeMarche added successfully.']);
        // -----------------------------------

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $typeMarche = TypeMarche::findOrFail($id);

        return view('typeMarches.show', ['typeMarche' => $typeMarche]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $typeMarche = TypeMarche::findOrFail($id);
        return view('typeMarches.edit')->with([
            'typeMarche' => $typeMarche,
        ]);
    }




    public function update(Request $request, string $id)
    {

        // -----------------------------------
        $typeMarche = TypeMarche::findOrFail($id);
        $validatedData = $request->validate([
            'type' => 'required|string|max:50|unique:typeMarches,id,'.$typeMarche->type,//check it again
        ]);

        //To Update Table we Two Methods Simple way
        //$typeMarche->update($request->except('_token','_method'));
        //Flexible Way
        $typeMarche->type = $validatedData['type'];

        $typeMarche->save();
        return redirect()->route('typeMarche')->with(['success'=>'TypeMarche updated successfully.']);
        // -----------------------------------
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $typeMarche = TypeMarche::findOrFail($id);
        $typeMarche->delete();
        return redirect()->route('typeMarche')->with(['success'=>'TypeMarche deleted successfully.']);
    }
}
