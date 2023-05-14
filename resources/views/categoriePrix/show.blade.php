@extends('layouts.app')


@section('content')

    <div>
        <h2>Show</h2>
    </div>

    <div class="card-body">
            <div class="form-group">
                <label for="nom" class="nom">Nom</label>
                <input type="text" class="form-control" placeholder="nom"  name="nom" value="{{$concurrent->nom}}">
            </div>
            <div class="form-group">
                <label for="ville" class="ville">Ville</label>
                <input type="text" class="form-control" placeholder="ville"  name="ville" value="{{$concurrent->ville}}">
            </div>
            <div class="form-group">
                <label for="montant" class="montant">Montant</label>
               