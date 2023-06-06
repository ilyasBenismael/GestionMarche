@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header bg-dark text-light">
                <h4 class="label-text-lighter">Edit Appel Offre</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('appelOffres.update', $appelOffres->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="numero">Numero:</label>
                        <input type="text" class="form-control" id="numero" name="numero" value="{{ $appelOffres->numero }}" required>
                    </div>

                    <div class="form-group">
                        <label for="estimation_globale">Estimation Globale:</label>
                        <input type="text" class="form-control" id="estimation_globale" name="estimation_globale" value="{{ $appelOffres->estimation_globale }}" required>
                    </div>

                    <div class="form-group">
                        <label for="estimation_detaillee">Estimation Detaillee:</label>
                        <br>
                        <input type="file" class="form-control-file" id="estimation_detaillee" name="estimation_detaillee">
                        <small class="form-text text-muted">Upload the estimation detaillee file.</small>
                    </div>

                    <div class="form-group">
                        <label for="objet">Objet:</label>
                        <input type="text" class="form-control" id="objet" name="objet" value="{{ $appelOffres->objet }}" required>
                    </div>

                    <div class="form-group">
                        <label for="date_douverture_des_plis">Date d'ouverture des plis:</label>
                        <input type="date" class="form-control" id="date_douverture_des_plis" name="date_douverture_des_plis" value="{{ $appelOffres->date_douverture_des_plis }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Appel Offre</button>
                </form>
            </div>
        </div>
    </div>
@endsection
