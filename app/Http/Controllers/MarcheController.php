<?php

namespace App\Http\Controllers;

use App\Models\appeloffre;
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
            'date_approbation' => 'required',
            'date_notification_approbation' => 'required',
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
            'date_approbation' => $request['date_approbation'],
            'date_notification_approbation' => $request['date_notification_approbation'],
            'statut' => "en instance",
        ]);

        return redirect('/marchelist');
    }

}
