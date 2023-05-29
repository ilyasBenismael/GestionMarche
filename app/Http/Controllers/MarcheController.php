<?php

namespace App\Http\Controllers;

use App\Models\appeloffre;
use App\Models\Attachement;
use App\Models\attributaire;
use App\Models\Concurrent;
use App\Models\marche;
use App\Models\Prixe;
use App\Models\typemarche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MarcheController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function goMarcheList()
    {
        $marches = marche::all();
        return response()->view('Marche/marcheList', ['marches' => $marches])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }


    public function goMarche($id)
    {
        $marche = marche::find($id);
        $appel = appeloffre::where('numero', '=', $marche->appel_doffre)->first();
        $attributaire = Attributaire::find($marche->attributaire)?->first();
        $prixList = Prixe::where('marche', $id)->get();
        $attachements = Attachement::where('marche', $id)->get();
        $data = [
            'marche' => $marche,
            'appel' => $appel,
            'prixList' => $prixList,
            'attributaire' => $attributaire,
            'attachements' => $attachements
        ];

        return response()->view('Marche/marche', $data)->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }


    public function goappelOffre($id)
    {
        $appelOffres = appeloffre::find($id);
        $concurrents = Concurrent::where('appeloffres_id', 'LIKE', $id)->get();
        $appel_id = $id;
        return view('appeloffres.show', compact('appelOffres', 'concurrents', 'appel_id'));
    }


    public function destroy($id)
    {
        $marche = marche::find($id);

        if (!$marche) {
            // Marche not found
            return redirect('/marchelist')->back()->withErrors('Marche not found.');
        }
        $marche->delete();
        return redirect('/marchelist')->withSuccess('Marche deleted successfully.');
    }

    public function goAddMarche()
    {
        $typemarches = typemarche::all();
        return response()->view('Marche/addMarche', ['typemarches' => $typemarches])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }


    public function addMarche(Request $request)
    {
        $request = $request->validate([
            'numero' => 'required',
            'estimation_globale' => 'required',
            'objet' => 'required',
            'estimation_detaillee' => 'required',
            'date_douverture_des_plis' => 'required',
            //////////////////////////////////
            'numero_marche' => 'required',
            'exercice' => 'required',
            'type_de_marche' => 'required',
            'responsable_de_suivi' => 'required',
            'montant' => 'required',
            'prix_revisable' => 'required',
        ]);



        if ($request['estimation_detaillee'] !== null) {
            $esti_det_file_name = time() . '_' . $request['estimation_detaillee']->getClientOriginalName();
            $request['estimation_detaillee']->move(public_path('files') . '/estimation_detaillees', $esti_det_file_name);
        } else {
            $esti_det_file_name = '';
        }

        appeloffre::create([
            'numero' => $request['numero'],
            'estimation_globale' => $request['estimation_globale'],
            'estimation_detaillee' => $esti_det_file_name,
            'objet' => $request['objet'],
            'date_douverture_des_plis' => $request['date_douverture_des_plis'],
        ]);


        marche::create([
            'appel_doffre' => $request['numero'],
            'numero_marche' => $request['numero_marche'],
            'exercice' => $request['exercice'],
            'type_de_marche' => $request['type_de_marche'],
            'statut' => "en instance",
            'responsable_de_suivi' => $request['responsable_de_suivi'],
            'montant' => $request['montant'],
            'prix_revisable' => $request['prix_revisable'],
        ]);


        if (isset($request->date_ordre_service)) {
            $marcheData['date_ordre_service'] = $request['date_ordre_service'];
        }

        if (isset($request->date_reception_provisoire)) {
            $marcheData['date_reception_provisoire'] = $request['date_reception_provisoire'];
        }

        if (isset($request->date_reception_definitive)) {
            $marcheData['date_reception_definitive'] = $request['date_reception_definitive'];
        }
        return redirect('/marchelist');
    }


    public function edit($id)
    {
        $marche = Marche::find($id);
        $typemarches = TypeMarche::all();

        if (!$marche) {
            // Marche not found
            return redirect()->back()->withErrors('Marche not found.');
        }
        return view('marche.edit', compact('marche', 'typemarches'));

    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'exercice' => 'required',
            'type_de_marche' => 'required',
            'date_approbation' => '',
            'date_notification_approbation' => '',
            'date_ordre_service' => '',
            'delai_dexecution' => '',
            'responsable_de_suivi' => 'required',
            'montant' => 'required',
            'prix_revisable' => 'required',
            'delai_garantie' => '',
            'date_reception_provisoire' => '',
            'date_reception_definitive' => '',
            'date_resiliation' => '',
            'motif_resiliation' => '',
            'attributaire' => '',
        ]);

        $marche = Marche::findOrFail($id);
        $marche->exercice = $validatedData['exercice'];
        $marche->type_de_marche = $validatedData['type_de_marche'];
        $marche->date_approbation = $validatedData['date_approbation'];
        $marche->date_notification_approbation = $validatedData['date_notification_approbation'];
        $marche->date_ordre_service = $validatedData['date_ordre_service'];
        $marche->delai_dexecution = $validatedData['delai_dexecution'];
        $marche->responsable_de_suivi = $validatedData['responsable_de_suivi'];
        $marche->montant = $validatedData['montant'];
        $marche->prix_revisable = $validatedData['prix_revisable'];
        $marche->delai_garantie = $validatedData['delai_garantie'];
        $marche->date_reception_provisoire = $validatedData['date_reception_provisoire'];
        $marche->date_reception_definitive = $validatedData['date_reception_definitive'];
        $marche->date_resiliation = $validatedData['date_resiliation'];
        $marche->motif_resiliation = $validatedData['motif_resiliation'];
        $marche->attributaire = $validatedData['attributaire'];
        $marche->save();

        return redirect()->route('marcheList')->withSuccess('Marche updated successfully.');
    }


    public function addDateOrdreService(Request $request, $id)
    {
        $marche = Marche::findOrFail($id);
        $dateOrdreService = $request->input('date_ordre_service_input');
        $marche->date_ordre_service = $dateOrdreService;
        $marche->save();
        return redirect()->route('marcheList')->withSuccess('Date Ordre Service Added Successfully.');
    }

    public function addDateReceptionProvisoire(Request $request, $id)
    {
        $marche = Marche::findOrFail($id);
        $dateReceptionProvisoire = $request->input('date_reception_provisoire_input');
        $marche->date_reception_provisoire = $dateReceptionProvisoire;
        $marche->save();
        return redirect()->route('marcheList')->withSuccess('Date Reception Provisoire Added Successfully.');
    }

    public function addDateReceptionDefinitive(Request $request, $id)
    {
        $marche = Marche::findOrFail($id);
        $dateReceptionDefinitive = $request->input('date_reception_definitive_input');
        $marche->date_reception_definitive = $dateReceptionDefinitive;
        $marche->save();
        return redirect()->route('marcheList')->withSuccess('Date Reception Definitive Added Successfully.');
    }


}
