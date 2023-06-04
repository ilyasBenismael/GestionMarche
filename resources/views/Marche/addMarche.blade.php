@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card h-100 bg-light">
                    <div class="card-header bg-dark text-light">
                        <h4 class="font-weight-bold text-center">Lancer un marche</h4>
                    </div>
                    <div class="card-body custom-bg-color">
                        <form method="POST" action="/addMarche" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="font-weight-bold mb-3">Appel d'offre</h4>
                                    <hr style="height: 4px; background-color: black;">
                                    <div class="form-group">
                                        <label for="numero">Numero</label>
                                        <input type="text" id="numero" name="numero"
                                               class="form-control border-dark custom-input" value="{{ old('numero') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="date_douverture_des_plis">Date d'ouverture des plis</label>
                                        <input type="date" id="date_douverture_des_plis" name="date_douverture_des_plis"
                                               class="form-control border-dark custom-input" value="{{ old('date_douverture_des_plis') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="estimation_globale">Estimation globale</label>
                                        <input type="number" id="estimation_globale" name="estimation_globale"
                                               class="form-control border-dark custom-input" value="{{ old('estimation_globale') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="objet">Objet</label>
                                        <input type="text" id="objet" name="objet"
                                               class="form-control border-dark custom-input" value="{{ old('objet') }}">
                                    </div>
                                    <div class="form-group my-2">
                                        <label for="estimation_detaillee">Estimation détaillée</label>
                                        <div>
                                            <input style="color: black" type="file" id="estimation_detaillee" name="estimation_detaillee"
                                                   class="form-control-file border-dark custom-file-input">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h4 class="font-weight-bold mb-3">Marche</h4>
                                    <hr style="height: 4px; background-color: black;">
                                    <div class="form-group">
                                        <label for="numero_marche">Numero Marche</label>
                                        <input type="number" id="numero_marche" name="numero_marche"
                                               class="form-control border-dark custom-input" value="{{ old('numero_marche') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="delai_garantie">Delai Garantie </label>
                                        <input type="number" id="delai_garantie" name="delai_garantie"
                                              placeholder="Days" class="form-control border-dark custom-input">
                                    </div>
                                    <div class="form-group">
                                        <label for="exercice">Exercice</label>
                                        <input type="number" id="exercice" name="exercice"
                                               class="form-control border-dark custom-input" value="{{ old('exercice') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="type_de_marche">Type Marche</label>
                                        <select name="type_de_marche" id="type_de_marche"
                                                class="form-control arrow-select border-dark custom-input">
                                            @foreach ($typemarches as $typemarche)
                                                <option value="{{$typemarche->type}}">{{$typemarche->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="responsable_de_suivi">Responsable de Suivi</label>
                                        <select name="responsable_de_suivi" id="responsable_de_suivi" class="form-control border-dark custom-input">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ old('responsable_de_suivi') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="prix_revisable">Prix Revisable</label>
                                        <select name="prix_revisable" id="prix_revisable" class="form-control arrow-select border-dark custom-input">
                                            <option value="false">False</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row mt-4">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block w-50 my-1">Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const typeDeMarcheSelect = document.getElementById('type_de_marche');
        const prixRevisableSelect = document.getElementById('prix_revisable');

        typeDeMarcheSelect.addEventListener('change', function () {
            const selectedValue = typeDeMarcheSelect.value;

            prixRevisableSelect.innerHTML = '';

            if (selectedValue === 'travaux') {
                const option1 = document.createElement('option');
                option1.value = 'true';
                option1.textContent = 'True';
                prixRevisableSelect.appendChild(option1);

                const option2 = document.createElement('option');
                option2.value = 'false';
                option2.textContent = 'False';
                prixRevisableSelect.appendChild(option2);

                prixRevisableSelect.disabled = false;
            } else {
                const option = document.createElement('option');
                option.value = 'false';
                option.textContent = 'False';
                prixRevisableSelect.appendChild(option);

                prixRevisableSelect.value = 'false';
                prixRevisableSelect.disabled = false;
            }
        });
    </script>
@endsection
