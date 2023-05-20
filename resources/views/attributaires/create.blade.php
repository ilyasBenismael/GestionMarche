@extends('layouts.app')

@section('content')


    <form action="{{ route('attributaires.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="raison_sociale">Raison Sociale:</label>
            <input type="text" name="raison_sociale" id="raison_sociale" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse:</label>
            <input type="text" name="adresse" id="adresse" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="compte_bancaire">Compte Bancaire:</label>
            <input type="text" name="compte_bancaire" id="compte_bancaire" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nom_banque">Nom Banque:</label>
            <input type="text" name="nom_banque" id="nom_banque" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="registre_de_commerce">Registre de Commerce:</label>
            <input type="text" name="registre_de_commerce" id="registre_de_commerce" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ville_registre_de_commerce">Ville Registre de Commerce:</label>
            <input type="text" name="ville_registre_de_commerce" id="ville_registre_de_commerce" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="cnss">cnss:</label>
            <input type="text" name="cnss" id="cnss" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="ville_cnss">Ville cnss:</label>
            <input type="text" name="ville_cnss" id="ville_cnss" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="patente">Patente:</label>
            <input type="text" name="patente" id="patente" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Attributaire</button>
    </form>

@endsection
