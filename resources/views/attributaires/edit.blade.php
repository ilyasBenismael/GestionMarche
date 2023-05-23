@extends('layouts.app')

@section('content')
    <form action="{{ route('attributaires.update', $attributaire->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="raison_sociale">Raison Sociale:</label>
            <input type="text" name="raison_sociale" id="raison_sociale" class="form-control" value="{{ $attributaire->raison_sociale }}">
            @error('raison_sociale')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="adresse">Adresse:</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $attributaire->adresse }}">
            @error('adresse')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="compte_bancaire">Compte Bancaire:</label>
            <input type="text" name="compte_bancaire" id="compte_bancaire" class="form-control" value="{{ $attributaire->compte_bancaire }}">
            @error('compte_bancaire')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nom_banque">Nom Banque:</label>
            <input type="text" name="nom_banque" id="nom_banque" class="form-control" value="{{ $attributaire->nom_banque }}">
            @error('nom_banque')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="registre_de_commerce">Registre de Commerce:</label>
            <input type="text" name="registre_de_commerce" id="registre_de_commerce" class="form-control" value="{{ $attributaire->registre_de_commerce }}">
            @error('registre_de_commerce')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="ville_registre_de_commerce">Ville Registre de Commerce:</label>
            <input type="text" name="ville_registre_de_commerce" id="ville_registre_de_commerce" class="form-control" value="{{ $attributaire->ville_registre_de_commerce }}">
            @error('ville_registre_de_commerce')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="cnss">cnss:</label>
            <input type="text" name="cnss" id="cnss" class="form-control" value="{{ $attributaire->cnss }}">
            @error('cnss')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="ville_cnss">Ville cnss:</label>
            <input type="text" name="ville_cnss" id="ville_cnss" class="form-control" value="{{ $attributaire->ville_cnss }}">
            @error('ville_cnss')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="patente">Patente:</label>
            <input type="text" name="patente" id="patente" class="form-control" value="{{ $attributaire->patente }}">
            @error('patente')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Attributaire</button>
    </form>
@endsection
