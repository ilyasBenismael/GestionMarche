@extends('layouts.app')

@section('content')

    <form method="POST" action="/addMarche" enctype="multipart/form-data">
        @csrf
        <h1>appel d'offre</h1>
        <div>
            <label for="numero">numero</label>
            <input type="text" id="numero" name="numero">
        </div>
        <div>
            <label for="date_douverture_des_plis">date d’ouverture des plis</label>
            <input type="date" id="date_douverture_des_plis" name="date_douverture_des_plis">
        </div>
        <div>
            <label for="estimation_globale">estimation globale</label>
            <input type="number" id="estimation_globale" name="estimation_globale">
        </div>
        <div>
            <label for="objet">objet</label>
            <input type="text" id="objet" name="objet">
        </div>
        <div>
            <label for="estimation_detaillee">estimation détaillée</label>
            <input type="file" id="estimation_detaillee" name="estimation_detaillee">
        </div>

        <h1>Marche</h1>
        <div>
            <label for="numero_marche">numero marche</label>
            <input type="number" id="numero_marche" name="numero_marche">
        </div>
        <div>
            <label for="exercice">exercice</label>
            <input type="number" id="exercice" name="exercice">
        </div>
        <label for="type_de_marche">Type_Marche</label>
        <select name="type_de_marche" id="type_de_marche" class="form-control">
            @foreach ($typemarches as $typemarche)
                <option value="{{$typemarche->type}}">{{$typemarche->type}}</option>
            @endforeach
        </select>

        <div>
            <label for="responsable_de_suivi">responsable_de_suivi</label>
            <input type="text" id="responsable_de_suivi" name="responsable_de_suivi">
        </div>

        <div>
            <label for="montant">montant</label>
            <input type="text" id="montant" name="montant">
        </div>


        {{--        <div>--}}
        {{--            <label for="date_approbation">date_approbation</label>--}}
        {{--            <input type="date" id="date_approbation" name="date_approbation">--}}
        {{--        </div>--}}
        {{--        <div>--}}
        {{--            <label for="date_notification_approbation">date_notification_approbation</label>--}}
        {{--            <input type="date" id="date_notification_approbation" name="date_notification_approbation">--}}
        {{--        </div>--}}
        {{--        <div>--}}
        {{--            <label for="date_ordre_service">date_ordre_service</label>--}}
        {{--            <input type="date" id="date_ordre_service" name="date_ordre_service">--}}
        {{--        </div>--}}
        {{--        <div>--}}
        {{--            <label for="delai_dexecution">delai_dexecution</label>--}}
        {{--            <input type="date" id="delai_dexecution" name="delai_dexecution">--}}
        {{--        </div>--}}

        {{--        <div>--}}
        {{--            <label for="prix_revisable">prix_revisable</label>--}}
        {{--            <input type="date" id="prix_revisable" name="prix_revisable">--}}
        {{--        </div>--}}

        {{--        <div>--}}
        {{--            <label for="delai_garantie">delai_garantie</label>--}}
        {{--            <input type="text" id="delai_garantie" name="delai_garantie">--}}
        {{--        </div>--}}

        {{--        <div>--}}
        {{--            <label for="date_reception_provisoire">date_reception_provisoire</label>--}}
        {{--            <input type="date" id="date_reception_provisoire" name="date_reception_provisoire">--}}
        {{--        </div>--}}

        {{--        <div>--}}
        {{--            <label for="date_reception_definitive">date_reception_definitive</label>--}}
        {{--            <input type="date" id="date_reception_definitive" name="date_reception_definitive">--}}
        {{--        </div>--}}

        {{--        <div>--}}
        {{--            <label for="date_resiliation">date_resiliation</label>--}}
        {{--            <input type="date" id="date_resiliation" name="date_resiliation">--}}
        {{--        </div>--}}

        {{--        <div>--}}
        {{--            <label for="motif_resiliation">motif_resiliation</label>--}}
        {{--            <input type="text" id="motif_resiliation" name="motif_resiliation">--}}
        {{--        </div>--}}
        {{--        <div>--}}
        {{--            <label for="attributaire">attributaire</label>--}}
        {{--            <input type="text" id="attributaire" name="attributaire">--}}
        {{--        </div>--}}

        <button type="submit" class="btn btn-primary">
            create
        </button>
    </form>

@endsection
