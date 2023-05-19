<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Goutte\Client;
use Illuminate\Http\Request;

class scrapper extends Controller
{
    public function getArray()
{
    $client = new Client();
    $crawler = $client->request('GET', 'https://www.marchespublics.gov.ma/index.php?page=entreprise.EntrepriseAdvancedSearch&AllCons&EnCours&searchAnnCons');
    $element = $crawler->filter('ctl0_CONTENU_PAGE_resultSearch_nombreElement')->first(); }

}
