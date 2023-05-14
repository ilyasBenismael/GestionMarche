<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Goutte\Client;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function goHome()
    {


        $roles = role::pluck('name')->toArray();
        $userscount = [];

        foreach ($roles as $role) {
            $count = User::where('role', $role)->count();
            $userscount[] = $count;
        }




//        $client = new Client();
//        $crawler = $client->request('GET', 'https://www.marchespublics.gov.ma/index.php?page=entreprise.EntrepriseAdvancedSearch&AllCons&EnCours&searchAnnCons');
//        $element = $crawler->filter('form#ctl0_ctl2 div#middle div#ctl0_CONTENU_PAGE_panelResult div#main-part div#ctl0_CONTENU_PAGE_resultSearch_panelElementsFound div#tabNav div#ongletLayer div.content table.table-results a tbody tr:first-child td.col-450[headers="cons_intitule"] div#ctl0_CONTENU_PAGE_resultSearch_tableauResultSearch_ctl1_panelBlocObjet')->text();
//

        return response()->view('home', [
            'roles' => $roles,
            'userscount' => $userscount,
//            'element' => $element
        ])->header('Cache-Control', 'no-cache, no-store, must-revalidate');
    }











}
