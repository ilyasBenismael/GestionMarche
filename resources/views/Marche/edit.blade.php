@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Marche</h1>
        <form action="{{ route('marche.update', ['id' => $marche->id]) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="form-group">
                <label for="exercice">Exercice:</label>
                <input type="text" class="form-control" id="exercice" name="exercice" value="{{ $marche->exercice }}">
            </div>

            <div class="form-group">
                <label for="type_de_marche">Type de Marche:</label>
                <select name="type_de_marche" id="type_de_marche" class="form-control">
                    @foreach ($typemarches as $typemarche)
                        <option
                            value="{{ $typemarche->type }}" {{ $typemarche->type == $marche->type_de_marche ? 'selected' : '' }}>
                            {{ $typemarche->type }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="date_approbation">Date d'approbation:</label>
                <input type="text" class="form-control" id="date_approbation" name="date_approbation"
                       value="{{ $marche->date_approbation }}">
            </div>

            <div class="form-group">
                <label for="date_notification_approbation">Date de notification d'approbation:</label>
                <input type="text" class="form-control" id="date_notification_approbation"
                       name="date_notification_approbation" value="{{ $marche->date_notification_approbation }}">
            </div>

            <div class="form-group">
                <label for="date_ordre_service">Date d'ordre de service:</label>
                <input type="text" class="form-control" id="date_ordre_service" name="date_ordre_service"
                       value="{{ $marche->date_ordre_service }}">
            </div>

            <div class="form-group">
                <label for="delai_dexecution">Délai d'exécution:</label>
                <input type="text" class="form-control" id="delai_dexecution" name="delai_dexecution"
                       value="{{ $marche->delai_dexecution }}">
            </div>

            <div class="form-group">
                <label for="responsable_de_suivi">Responsable de suivi:</label>
                <input type="text" class="form-control" id="responsable_de_suivi" name="responsable_de_suivi"
                       value="{{ $marche->responsable_de_suivi }}">
            </div>

            <div class="form-group">
                <label for="montant">Montant:</label>
                <input type="text" class="form-control" id="montant" name="montant" value="{{ $marche->montant }}">
            </div>

            <div class="form-group">
                <label for="prix_revisable">Prix révisable:</label>
                <select name="prix_revisable" id="prix_revisable" class="form-control">
                    <option value="true" {{ $marche->prix_revisable == true ? 'selected' : '' }}>true</option>
                    <option value="false" {{ $marche->prix_revisable == false ? 'selected' : '' }}>false</option>
                </select>
            </div>

            <div class="form-group">
                <label for="delai_garantie">Délai de garantie:</label>
                <input type="text" class="form-control" id="delai_garantie" name="delai_garantie"
                       value="{{ $marche->delai_garantie }}">
            </div>

            <div class="form-group">
                <label for="date_reception_provisoire">Date de réception provisoire:</label>
                <input type="text" class="form-control" id="date_reception_provisoire" name="date_reception_provisoire"
                       value="{{ $marche->date_reception_provisoire }}">
            </div>

            <div class="form-group">
                <label for="date_reception_definitive">Date de réception définitive:</label>
                <input type="text" class="form-control" id="date_reception_definitive" name="date_reception_definitive"
                       value="{{ $marche->date_reception_definitive }}">
            </div>

            <div class="form-group">
                <label for="date_resiliation">Date de résiliation:</label>
                <input type="text" class="form-control" id="date_resiliation" name="date_resiliation"
                       value="{{ $marche->date_resiliation }}">
            </div>

            <div class="form-group">
                <label for="motif_resiliation">Motif de résiliation:</label>
                <input type="text" class="form-control" id="motif_resiliation" name="motif_resiliation"
                       value="{{ $marche->motif_resiliation }}">
            </div>

            <div class="form-group">
                <label for="attributaire">Attributaire:</label>
                <input type="text" class="form-control" id="attributaire" name="attributaire"
                       value="{{ $marche->attributaire }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
