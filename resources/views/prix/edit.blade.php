@extends('layouts.app')


@section('content')
    <div>
        <h2>Update</h2>
    </div>
    @include('layouts.alert') <!-- error handling -->
    <div class="card-body">
        <form action="{{route('prix.update', $prix)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="numero" class="numero">Numero</label>
                <input type="number" class="form-control" placeholder="numero"  name="numero" value="{{old('numero',$prix->numero)}}">
            </div>
            <div class="form-group">
                <label for="designation" class="designation">Designation</label>
                <input type="text" class="form-control" placeholder="designation"  name="designation" value="{{old('designation',$prix->designation)}}">
            </div>
            <div class="form-group">
                <label for="unite" class="unite">unite</label>
                <input type="number" class="form-control" placeholder="unite"  name="unite" value="{{old('unite',$prix->unite)}}">
            </div>
            <div class="form-group">
                <label for="quantite" class="quantite">quantité</label>
                <input type="number" class="form-control" placeholder="quantite"  name="quantite" value="{{old('quantite',$prix->quantite)}}">
            </div>
            <div class="form-group">
                <label for="prix_unitaire" class="prix_unitaire">prix unitaire</label>
                <input type="number" class="form-control" placeholder="prix_unitaire"  name="prix_unitaire" value="{{old('prix_unitaire',$prix->prix_unitaire)}}">
            </div>
            <div class="form-group">
                <label for="categorie_prix" class="categorie_prix ">catégorie prix </label>
                <input type="text" class="form-control" placeholder="categorie_prix"  name="categorie_prix" value="{{old('categorie_prix',$prix->categorie_prix)}}">
            </div>


            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
