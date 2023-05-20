@extends('layouts.app')

@section('content')

    <h5>Marche : {{$marche->numero_marche}}</h5>
    <h5>exercice : {{$marche->exercice}}</h5>
    <h5>statut : {{$marche->statut}}</h5>
    <h5>responsable_de_suivi : {{$marche->responsable_de_suivi}}</h5>
    <h5>montant : {{$marche->montant}}</h5>


    <h5>Appel d'offre : </h5>
    @if($appel==null)
        <h6>no appel d'offre</h6>
    @else
        <a href="/appeloffre/{{$appel->id}}">appel d'offre {{$marche->appel_doffre}}</a>
    @endif

@endsection
