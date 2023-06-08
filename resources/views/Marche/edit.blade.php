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
                @error('exercice')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="type_de_marche">Type de Marche:</label>
                <select name="type_de_marche" id="type_de_marche" class="form-control">
                    @foreach ($typemarches as $typemarche)
                        <option value="{{ $typemarche->type }}" {{ $typemarche->type == $marche->type_de_marche ? 'selected' : '' }}>
                            {{ $typemarche->type }}
                        </option>
                    @endforeach
                </select>
                @error('type_de_marche')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="statut">Statut:</label>
                <input type="text" class="form-control" id="statut" name="statut" value="{{ $marche->statut }}">
                @error('statut')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_approbation">Date d'approbation:</label>
                <input type="date" class="form-control" id="date_approbation" name="date_approbation" value="{{ $marche->date_approbation }}">
                @error('date_approbation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_reception_provisoire">Date de réception provisoire:</label>
                <input type="date" class="form-control" id="date_reception_provisoire" name="date_reception_provisoire" value="{{ $marche->date_reception_provisoire }}">
                @error('date_reception_provisoire')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_notification_approbation">Date de notification d'approbation:</label>
                <input type="date" class="form-control" id="date_notification_approbation" name="date_notification_approbation" value="{{ $marche->date_notification_approbation }}">
                @error('date_notification_approbation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_ordre_service">Date d'ordre de service:</label>
                <input type="date" class="form-control" id="date_ordre_service" name="date_ordre_service" value="{{ $marche->date_ordre_service }}">
                @error('date_ordre_service')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="delai_dexecution">Délai d'exécution:</label>
                <input type="text" class="form-control" id="delai_dexecution" name="delai_dexecution" value="{{ $marche->delai_dexecution }}">
                @error('delai_dexecution')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="responsable_de_suivi">Responsable de suivi:</label>
                <input type="text" class="form-control" id="responsable_de_suivi" name="responsable_de_suivi" value="{{ $marche->responsable_de_suivi }}">
                @error('responsable_de_suivi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="montant">Montant:</label>
                <input type="text" class="form-control" id="montant" name="montant" value="{{ $marche->montant }}">
                @error('montant')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="prix_revisable">Prix révisable:</label>
                <select name="prix_revisable" id="prix_revisable" class="form-control">
                    <option value="true" {{ $marche->prix_revisable == true ? 'selected' : '' }}>true</option>
                    <option value="false" {{ $marche->prix_revisable == false ? 'selected' : '' }}>false</option>
                </select>
                @error('prix_revisable')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="delai_garantie">Délai de garantie:</label>
                <input type="text" class="form-control" id="delai_garantie" name="delai_garantie" value="{{ $marche->delai_garantie }}">
                @error('delai_garantie')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_reception_definitive">Date de réception définitive:</label>
                <input type="date" class="form-control" id="date_reception_definitive" name="date_reception_definitive" value="{{ $marche->date_reception_definitive }}">
                @error('date_reception_definitive')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="date_resiliation">Date de résiliation:</label>
                <input type="date" class="form-control" id="date_resiliation" name="date_resiliation" value="{{ $marche->date_resiliation }}">
                @error('date_resiliation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="motif_resiliation">Motif de résiliation:</label>
                <input type="text" class="form-control" id="motif_resiliation" name="motif_resiliation" value="{{ $marche->motif_resiliation }}">
                @error('motif_resiliation')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="attributaire">Attributaire:</label>
                <input type="text" class="form-control" id="attributaire" name="attributaire" value="{{ $marche->attributaire }}">
                @error('attributaire')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
