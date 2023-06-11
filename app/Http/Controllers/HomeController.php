<?php

namespace App\Http\Controllers;

use App\Models\Concurrent;
use App\Models\marche;
use App\Models\notification;
use App\Models\role;
use App\Models\TypeMarche;
use App\Models\User;
use Goutte\Client;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{



    /**
     * Create a new controller instance.
     *
     * @return void
     */



    public function __construct()
    {
        $this->middleware('auth')->only('goHome');
    }

//
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */




    /*
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.marchespublics.gov.ma/index.php?page=entreprise.EntrepriseAdvancedSearch&AllCons&EnCours&searchAnnCons');
        $element = $crawler->filter('#ctl0_CONTENU_PAGE_resultSearch_nombreElement')->first()->text();
*/




    public function goHome()
    {

        $roles = role::pluck('name')->toArray();
        $userscount = [];

        foreach ($roles as $role) {
            $count = User::where('role', $role)->count();
            $userscount[] = $count;
        }




        ////status blcount tmarchee
        $statusArray = ['En Instance', 'En Cours', 'Réceptionné', 'Clôturé', 'Résilié'];
        $marcheCountStatus = [];

        foreach ($statusArray as $status) {
            $marcheCount = Marche::where('statut', $status)->count();
            $marcheCountStatus[$status] = $marcheCount;
        }




        $typemarches = Typemarche::pluck('type')->toArray();
        $marcheCountsType = [];
        foreach ($typemarches as $typemarche) {
            $marcheCount = Marche::where('type_de_marche', $typemarche)->count();
            $marcheCountsType[] = $marcheCount;
        }



        $marches = Marche::orderBy('created_at', 'desc')->limit(15)->get();
        $MarcheArray15 = [];
        $montantArray = [];

        foreach ($marches as $marche) {
            $MarcheArray15[] = $marche->numero_marche;
            $montantArray[] = $marche->montant;
        }





        $marchesCountsEx = [];
        $years = [];

        for ($year = 2015; $year <= 2025; $year++) {
            $marchesCount = Marche::where('exercice', $year)->count();
            $marchesCountsEx[$year] = $marchesCount;
            $years[] = $year;
        }

        $marchesResilie = Marche::where('statut', 'resilie')->get()->count();
        $marchesCloture = Marche::where('statut', 'cloture')->get()->count();

        $userTotalNumber = User::count();
/*
        $notifications = Notification::where('target', auth()->id())->get();
        $nbr_notif = $notifications->count();*/

        return response()->view('home', [
            'roles' => $roles,
            'userscount' => $userscount,
            'statusArray' => $statusArray,
            'marcheCountStatus' => $marcheCountStatus,
            'typemarches' => $typemarches,
            'marcheCountsType' => $marcheCountsType,
            'MarcheArray15' => $MarcheArray15,
            'montantArray' => $montantArray,
            'marchesCountsEx' => $marchesCountsEx,
            'years' => $years,
            'marchesResilie' => $marchesResilie,
            'marchesCloture' => $marchesCloture,
            'userTotalNumber' => $userTotalNumber,
            /*'notifications' => $notifications,
            'nbr_notif' => $nbr_notif*/
            /*'element' => $element*/
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate');

    }


    public function getVilleCount($ville)
    {
        $villeValues = [];
        $class = '';

        if (in_array($ville, ['tanger', 'tetouan', 'alhoceima'])) {
            $villeValues = ['tanger', 'tetouan', 'alhoceima'];
            $class = 'tanger';
        } elseif (in_array($ville, ['oujda', 'nador', 'berkane'])) {
            $villeValues = ['oujda', 'nador', 'berkane'];
            $class = 'oujda';
        } elseif (in_array($ville, ['fes', 'meknes'])) {
            $villeValues = ['fes', 'meknes'];
            $class = 'fes';
        } elseif (in_array($ville, ['rabat', 'sale', 'kenitra'])) {
            $villeValues = ['rabat', 'sale', 'kenitra'];
            $class = 'rabat';
        } elseif (in_array($ville, ['benimellal', 'khouribga', 'khenifra'])) {
            $villeValues = ['benimellal', 'khouribga', 'khenifra'];
            $class = 'benimellal';
        } elseif (in_array($ville, ['casablanca', 'settat'])) {
            $villeValues = ['casablanca', 'settat'];
            $class = 'casablanca';
        } elseif (in_array($ville, ['marrakech', 'safi'])) {
            $villeValues = ['marrakech', 'safi'];
            $class = 'marrakech';
        } elseif (in_array($ville, ['ouarzazate', 'errachidia', 'zagora'])) {
            $villeValues = ['ouarzazate', 'errachidia', 'zagora'];
            $class = 'ouarzazate';
        } elseif (in_array($ville, ['agadir', 'essaouira'])) {
            $villeValues = ['agadir', 'essaouira'];
            $class = 'agadir';
        } elseif (in_array($ville, ['guelmim', 'tantan'])) {
            $villeValues = ['guelmim', 'tantan'];
            $class = 'guelmim';
        } elseif (in_array($ville, ['laayoune', 'boujdour'])) {
            $villeValues = ['laayoune', 'boujdour'];
            $class = 'laayoune';
        }elseif (in_array($ville, ['dakhla', 'boujdour', 'dakhla'])) {
            $villeValues = ['dakhla', 'boujdour', 'dakhla'];
            $class = 'dakhla';
        }

        $count = Concurrent::whereIn('ville', $villeValues)->count();
        $total = Concurrent::count();
        $percentage = ($total > 0) ? round(($count / $total) * 100, 2) : 0;

        return response()->json([
            'success' => true,
            'count' => $count,
            'percentage' => $percentage,
            'class' => $class
        ]);
    }











}
