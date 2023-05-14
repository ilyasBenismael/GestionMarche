@extends('layouts.app')


@section('content')

    <div>
        <h2>Show</h2>
    </div>

    <!-- appeloffres/show.blade.php -->

    <h1>Appel Offre Details</h1>
    <p>Numero: {{ $appelOffres->numero }}</p>
    <p>Estimation Globale: {{ $appelOffres->estimation_globale }}</p>
    <p>Estimation Detaillee: {{ $appelOffres->estimation_detaillee }}</p>
    <p>Objet: {{ $appelOffres->objet }}</p>
    <p>Date d'ouverture des plis: {{ $appelOffres->date_douverture_des_plis }}</p>

    <h2>Concurrents:</h2>
    @if ($concurrents->count() > 0)
        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Ville</th>
                <th>Montant</th>
                <th>Statut</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($concurrents as $concurrent)
                <tr>
                    <td>{{ $concurrent->nom }}</td>
                    <td>{{ $concurrent->ville }}</td>
                    <td>{{ $concurrent->montant }}</td>
                    <td>{{ $concurrent->statut }}</td>
                </tr>
            @endforeach
            <a href="/concurrent/create/{{ $appelOffres->id }}">Add New Concurrent</a>
            </tbody>
        </table>
    @else
        <p>No concurrents found.</p>
        <a href="/concurrent/create/{{ $appelOffres->id }}">Add New Concurrent</a>
    @endif

@endsection
