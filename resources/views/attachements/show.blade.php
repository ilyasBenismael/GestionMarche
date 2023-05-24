@extends('layouts.app')


@section('content')

    <div class="card mb-4">
        <div class="card-header bg-dark text-light">
            <h4 class="label-text-lighter">Attachement</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3 border-bottom border-grey">
                <div class="col-4 font-weight-bold label-text-dark">Date:</div>
                <div class="col-8 value-text-light">{{$attachement->date}}</div>
            </div>
            <div class="row mb-3 border-bottom border-grey">
                <div class="col-4 font-weight-bold label-text-dark">Marche:</div>
                <div class="col-8 value-text-light">{{$attachement->marche}}</div>
            </div>
            <div class="row mb-3 border-bottom border-grey">
                <div class="col-4 font-weight-bold label-text-dark">Numero:</div>
                <div class="col-8 value-text-light">{{$attachement->numero}}</div>
            </div>
            <div class="row mb-3 border-bottom border-grey">
                <div class="col-4 font-weight-bold label-text-dark">Montant de Révision:</div>
                <div class="col-8 value-text-light">{{$attachement->montant_de_revision}}</div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-dark text-light">
            <h4 class="label-text-lighter">Quantités Exécutées</h4>
        </div>
        <div class="card-body">
            @foreach ($quantite_execute as $item)
                <div class="row border-bottom border-grey">
                    <div class="col-4">
                        <div class="font-weight-bold">Prix:</div>
                        <div class="value-text-light">{{ $item->prix }}</div>
                    </div>
                    <div class="col-4">
                        <div class="font-weight-bold">Quantité:</div>
                        <div class="value-text-light">{{ $item->quantite }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
