@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header bg-dark text-light">
                <h4 class="label-text-lighter">Appel Offre Details</h4>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="value-container border border-dark rounded p-3">
                        <p class="font-weight-bold mb-2">
                            <span class="text-uppercase label-text-dark">Numero:</span>
                            <span class="font-weight-normal text-lg value-text-light"> {{ $appelOffres->numero }}</span>
                        </p>
                        <p class="font-weight-bold mb-2">
                            <span class="text-uppercase label-text-dark">Estimation Globale:</span>
                            <span class="font-weight-normal text-lg value-text-light"> {{ $appelOffres->estimation_globale }}</span>
                        </p>
                        <p class="font-weight-bold mb-2">
                            <span class="text-uppercase label-text-dark">Estimation Detaillee:</span>
                            <span class="font-weight-normal text-lg value-text-light"> {{ $appelOffres->estimation_detaillee }}</span>
                        </p>
                        <p class="font-weight-bold mb-2">
                            <span class="text-uppercase label-text-dark">Objet:</span>
                            <span class="font-weight-normal text-lg value-text-light"> {{ $appelOffres->objet }}</span>
                        </p>
                        <p class="font-weight-bold mb-2">
                            <span class="text-uppercase label-text-dark">Date d'ouverture des plis:</span>
                            <span class="font-weight-normal text-lg value-text-light"> {{ $appelOffres->date_douverture_des_plis }}</span>
                        </p>
                    </div>
                </div>

                <div class="mb-4">
                    <h4 class="font-weight-bold">Concurrents:</h4>
                    @if ($concurrents->count() > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($concurrents as $concurrent)
                                <tr>
                                    <td>{{ $concurrent->nom }}</td>
                                    <td>{{ $concurrent->ville }}</td>
                                    <td>{{ $concurrent->montant }}</td>
                                    <td>{{ $concurrent->statut }}</td>
                                    <td>
                                        <form action="/concurrent/{{ $concurrent->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="font-weight-bold">No concurrents found.</p>
                    @endif
                    <a href="/concurrent/create/{{ $appel_id }}" class="btn btn-primary">Add New Concurrent</a>
                </div>
            </div>
        </div>

        <a href="{{ route('appelOffres.edit', $appelOffres->id) }}" class="btn btn-primary">Edit Appel Offre</a>
    </div>
@endsection
