<?php

namespace App\Http\Controllers;

use App\Models\appeloffre;
use App\Models\Concurrent;
use App\Models\marche;
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
        $marches=marche::all();
        return response()->view('Marche/marcheList', ['marches'=>$marches])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }




    public function goMarche($id)
    {
        $marche=marche::find($id);
        $appel=appeloffre::where('numero', '=', $marche->appel_doffre)->first();

        $data = [
            'marche'=>$marche,
            'appel' => $appel
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
        $marche = Marche::find($id);

        if (!$marche) {
            // Marche not found
            return redirect('/marchelist')->back()->withErrors('Marche not found.');
        }
        $marche->delete();
        return redirect('/marchelist')->withSuccess('Marche deleted successfully.');
    }


    public function goAddMarche()
    {
        $typemarches=typemarche::all();
        return response()->view('Marche/addMarche', ['typemarches'=>$typemarches])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
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
            'estimation_detaillee' =>$esti_det_file_name,
            'objet' => $request['objet'],
            'date_douverture_des_plis' => $request['date_douverture_des_plis'],
        ]);


        marche::create([
            'appel_doffre' => $request['numero'],
            'numero_marche' => $request['numero_marche'],
            'exercice' => $request['exercice'],
            'type_de_marche' => $request['type_de_marche'],
            'statut' => "en instance",
            'responsable_de_suivi' =>$request['responsable_de_suivi'],
            'montant' => $request['montant'],
        ]);

        return redirect('/marchelist');
    }



    public function update(Request $request, $id)
    {
        $marche = Marche::find($id);

        if (!$marche) {
            // Marche not found
            return redirect()->back()->withErrors('Marche not found.');
        }

        $marche->exercice = $request->input('exercice');
        $marche->type_de_marche = $request->input('type_de_marche');
        $marche->date_approbation = $request->input('date_approbation');
        $marche->date_notification_approbation = $request->input('date_notification_approbation');
        $marche->date_ordre_service = $request->input('date_ordre_service');
        $marche->delai_dexecution = $request->input('delai_dexecution');
        $marche->responsable_de_suivi = $request->input('responsable_de_suivi');
        $marche->montant = $request->input('montant');
        $marche->prix_revisable = $request->input('prix_revisable');
        $marche->delai_garantie = $request->input('delai_garantie');
        $marche->date_reception_provisoire = $request->input('date_reception_provisoire');
        $marche->date_reception_definitive = $request->input('date_reception_definitive');
        $marche->date_resiliation = $request->input('date_resiliation');
        $marche->motif_resiliation = $request->input('motif_resiliation');
        $marche->attributaire = $request->input('attributaire');

        $marche->save();

        return redirect('/marchelist')->withSuccess('Marche updated successfully.');
    }







}
