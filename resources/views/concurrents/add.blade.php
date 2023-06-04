@extends('layouts.app')


@section('content')

    <div>
        <h2>Add New</h2>
    </div>
    @include('layouts.alert') <!-- error handling -->

    <div class="card-body">
        <form action="{{route('concurrent.store')}}" method="POST">
            @csrf
            <input type="hidden" name="appeloffre_id" value="{{ $appel_id }}">
            <div class="form-group">
                <label for="nom" class="nom">Nom</label>
                <input type="text" class="form-control" placeholder="nom"  name="nom" value="{{old('nom')}}">
            </div>
            <div class="form-group">
                <label for="ville" class="ville">Ville</label>
                <input type="text" class="form-control" placeholder="ville"  name="ville" value="{{old('ville')}}">
            </div>
            <div class="form-group">
                <label for="montant" class="montant">Montant</label>
                <input type="text" class="form-control" placeholder="montant"  name="montant" value="{{old('montant')}}">
            </div>
            <div class="form-group">
                <label for="statut" class="statut">Statut</label>
                <select name="statut" class="form-control">
                    <option value="attributaire" {{ old('statut') == 'attributaire' ? 'selected' : '' }}>Attributaire</option>
                    <option value="non-attributaire" {{ old('statut') == 'non-attributaire' ? 'selected' : '' }}>Non-attributaire</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
