@extends('layouts.app')

@section('content')
    <h1>Attributaire Details</h1>

    <div>
        <p><strong>Raison Sociale:</strong> {{ $attributaire->raison_sociale }}</p>
        <p><strong>Adresse:</strong> {{ $attributaire->adresse }}</p>
        <p><strong>Compte Bancaire:</strong> {{ $attributaire->compte_bancaire }}</p>
        <!-- Add more paragraphs for other attributes -->
    </div>
@endsection
