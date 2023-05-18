@extends('layouts.app')

@section('content')

    <h5>Marche : {{$marche->numero_marche}}</h5>
    <h5>Type : {{$marche->type_de_marche}}</h5>

    <h5>Appel d'offre :</h5>
    @if($appel==null)
        <h6>no appel d'offre</h6>
    @else
        <a href="/appeloffre/{{$appel->id}}">appel d'offre {{$marche->appel_doffre}}</a>
    @endif

@endsection
