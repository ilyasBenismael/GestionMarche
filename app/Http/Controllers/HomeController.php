<?php

namespace App\Http\Controllers;

use App\Models\Concurrent;
use App\Models\role;
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



    public function goHome()
    {

        $roles = role::pluck('name')->toArray();
        $userscount = [];

        foreach ($roles as $role) {
            $count = User::where('role', $role)->count();
            $userscount[] = $count;
        }
/*
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.marchespublics.gov.ma/index.php?page=entreprise.EntrepriseAdvancedSearch&AllCons&EnCours&searchAnnCons');
        $element = $crawler->filter('#ctl0_CONTENU_PAGE_resultSearch_nombreElement')->first()->text();
*/


        return response()->view('home', [
            'roles' => $roles,
            'userscount' => $userscount,
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
