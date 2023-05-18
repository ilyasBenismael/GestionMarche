@extends('layouts.app')


@section('content')

    <div>
        <h2>Show</h2>
    </div>

    <div class="card-body">

        <div class="form-group">
            <label for="date" class="date">Date</label>
            <input type="date" disabled class="form-control" placeholder="date"  name="date" value="{{$attachement->date}}">
        </div>
        <div class="form-group">
            <label for="marche" class="marche">Marche</label>
            <input type="text" disabled class="form-control" placeholder="marche"  name="marche" value="{{$attachement->marche}}">
        </div>
        <div class="form-group">
            <label for="numero" class="numero">Numero</label>
            <input type="number" disabled class="form-control" placeholder="numero"  name="numero" value="{{$attachement->numero}}">
        </div>
        <div class="form-group">
            <label for="montant_de_revision" class="montant_de_revision">montant de révision</label>
            <input type="number" disabled class="form-control" placeholder="montant_de_revision"  name="montant_de_revision" value="{{$attachement->montant_de_revision}}">
        </div>
    </div>
@endsection
