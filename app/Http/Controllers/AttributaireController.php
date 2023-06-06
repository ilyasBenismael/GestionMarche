<?php

namespace App\Http\Controllers;

    use App\Models\appeloffre;
    use App\Models\attributaire;
    use App\Models\marche;
    use Illuminate\Http\Request;

class AttributaireController extends Controller
{
    public function show($id)
    {
        $attributaire = Attributaire::findOrFail($id);
        return view('attributaires.show', compact('attributaire'));
    }

    public function store(Request $request, $marche_id)
    {
        $validatedData = $request->validate([
            'raison_sociale' => 'required',
            'adresse' => 'required',
            'compte_bancaire' => 'required',
            'nom_banque' => 'required',
            'registre_de_commerce' => 'required',
            'ville_registre_de_commerce' => 'required',
            'cnss' => 'required',
            'ville_cnss' => 'required',
            'patente' => 'required',
        ]);

        $attributaire = new attributaire();
        $attributaire->raison_sociale = $validatedData['raison_sociale'];
        $attributaire->adresse = $validatedData['adresse'];
        $attributaire->compte_bancaire = $validatedData['compte_bancaire'];
        $attributaire->nom_banque = $validatedData['nom_banque'];
        $attributaire->registre_de_commerce = $validatedData['registre_de_commerce'];
        $attributaire->ville_registre_de_commerce = $validatedData['ville_registre_de_commerce'];
        $attributaire->cnss = $validatedData['cnss'];
        $attributaire->ville_cnss = $validatedData['ville_cnss'];
        $attributaire->patente = $validatedData['patente'];
        $attributaire->save();

        $marche = marche::find($marche_id);
        $marche->attributaire = $attributaire->id;
        $marche->save();

        return redirect('/marche/'.$marche_id)->with('success', 'Attributaire created successfully!');

    }


    public function create($marche_id)
    {
        return view('attributaires.create',compact('marche_id'));
    }


    public function update(Request $request, $id)
    {
        $attributaire = Attributaire::findOrFail($id);

        $validatedData = $request->validate([
            'raison_sociale' => 'required',
            'adresse' => 'required',
            'compte_bancaire' => 'required',
            'nom_banque' => 'required',
            'registre_de_commerce' => 'required',
            'ville_registre_de_commerce' => 'required',
            'cnss' => 'required',
            'ville_cnss' => 'required',
            'patente' => 'required',
        ]);

        $attributaire->update($validatedData);
        $marche = marche::where('attributaire', '=', $id)->first();

        return redirect('/marche/'.$marche->id)->with('success', 'Attributaire created successfully!');
    }



    public function edit($id)
    {
        $attributaire = Attributaire::findOrFail($id);
        return view('attributaires.edit', compact('attributaire'));
    }



    public function destroy($id)
    {
        $attributaire = Attributaire::findOrFail($id);
        $attributaire->delete();

        return redirect()->back()->with('success', 'Attributaire deleted successfully.');
    }


}
