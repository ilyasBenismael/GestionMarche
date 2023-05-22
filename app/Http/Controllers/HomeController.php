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
        $count = Concurrent::where('ville', $ville)->count();
        $total = Concurrent::count();
        $percentage = ($total > 0) ? round(($count / $total) * 100, 2) : 0;

        return response()->json([
            'success' => true,
            'count' => $count,
            'percentage' => $percentage
        ]);
    }










}
