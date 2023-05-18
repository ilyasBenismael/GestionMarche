@extends('layouts.app')


@section('content')

    <div>
        <h2>Show</h2>
    </div>

    <div class="card-body">
        <div class="form-group">
            <label for="numero" class="numero">Numero</label>
            <input type="number" disabled class="form-control" placeholder="numero"  name="numero" value="{{$prix->numero}}">
        </div>
        <div class="form-group">
            <label for="designation" class="designation">Designation</label>
            <input type="text" disabled class="form-control" placeholder="designation"  name="designation" value="{{$prix->designation}}">
        </div>
        <div class="form-group">
            <label for="unite" class="unite">unite</label>
            <input type="number" disabled class="form-control" placeholder="unite"  name="unite" value="{{$prix->unite}}">
        </div>
        <div class="form-group">
            <label for="quantite" class="quantite">quantité</label>
            <input type="number" disabled class="form-control" placeholder="quantite"  name="quantite" value="{{$prix->quantite}}">
        </div>
        <div class="form-group">
            <label for="prix_unitaire" class="prix_unitaire">prix unitaire</label>
            <input type="number" disabled class="form-control" placeholder="prix_unitaire"  name="prix_unitaire" value="{{$prix->prix_unitaire}}">
        </div>
        <div class="form-group">
            <label for="categorie_prix" class="categorie_prix ">catégorie prix </label>
            <input type="text" disabled class="form-control" placeholder="categorie_prix"  name="categorie_prix" value="{{$prix->categorie_prix}}">
        </div>
    </div>
@endsection
