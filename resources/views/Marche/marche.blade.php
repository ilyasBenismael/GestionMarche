@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mb-4">
            <div class="card-header bg-dark text-light">
                <h4 class="label-text-lighter">Marche Details</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3 border-bottom border-grey">
                    <div class="col-4 font-weight-bold label-text-dark">Numero Marche:</div>
                    <div class="col-8 value-text-light">{{$marche->numero_marche}}</div>
                </div>
                <div class="row mb-3 border-bottom border-grey">
                    <div class="col-4 font-weight-bold label-text-dark">Exercice:</div>
                    <div class="col-8 value-text-light">{{$marche->exercice}}</div>
                </div>
                <div class="row mb-3 border-bottom border-grey">
                    <div class="col-4 font-weight-bold label-text-dark">Type de Marché:</div>
                    <div class="col-8 value-text-light">{{$marche->type_de_marche}}</div>
                </div>
                <div class="row mb-3 border-bottom border-grey">
                    <div class="col-4 font-weight-bold label-text-dark">Statut:</div>
                    <div class="col-8 value-text-light">{{$marche->statut}}</div>
                </div>
                <div class="row mb-3 border-bottom border-grey">
                    <div class="col-4 font-weight-bold label-text-dark">Responsable de Suivi:</div>
                    <div class="col-8 value-text-light">{{$marche->responsable_de_suivi}}</div>
                </div>
                <div class="row mb-3 border-bottom border-grey">
                    <div class="col-4 font-weight-bold label-text-dark">Montant:</div>
                    <div class="col-8 value-text-light">{{$marche->montant}}</div>
                </div>
                <div class="row mb-3 border-bottom border-grey">
                    <div class="col-4 font-weight-bold label-text-dark">Prix Revisable:</div>
                    <div class="col-8 value-text-light">{{$marche->prix_revisable}}</div>
                </div>
                <div class="row border-bottom border-light">
                    @if ($appel == null)
                        <h6 class="text-light">No appel d'offre</h6>
                    @else
                        <a href="/appeloffre/{{$appel->id}}" class="btn btn-sm text-white btn-primary w-25">Appel
                            d'offre et concurrents</a>
                    @endif
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header bg-dark text-light">
                <h4 class="label-text-lighter">Attributaire</h4>
            </div>
            <div class="card-body">
                @if ($attributaire)
                    <div class="row mb-3 border-bottom border-grey">
                        <div class="col-4 font-weight-bold label-text-dark">Raison Sociale:</div>
                        <div class="col-8 value-text-light">{{$attributaire->raison_sociale}}</div>
                    </div>

                    <div class="row mb-3 border-bottom border-grey">
                        <div class="col-4 font-weight-bold label-text-dark">Adresse:</div>
                        <div class="col-8 value-text-light">{{$attributaire->adresse}}</div>
                    </div>

                    <div class="row mb-3 border-bottom border-grey">
                        <div class="col-4 font-weight-bold label-text-dark">Compte Bancaire:</div>
                        <div class="col-8 value-text-light">{{$attributaire->compte_bancaire}}</div>
                    </div>

                    <div class="row mb-3 border-bottom border-grey">
                        <div class="col-4 font-weight-bold label-text-dark">Nom Banque:</div>
                        <div class="col-8 value-text-light">{{$attributaire->nom_banque}}</div>
                    </div>

                    <div class="row mb-3 border-bottom border-grey">
                        <div class="col-4 font-weight-bold label-text-dark">Registre de Commerce:</div>
                        <div class="col-8 value-text-light">{{$attributaire->registre_de_commerce}}</div>
                    </div>

                    <div class="row mb-3 border-bottom border-grey">
                        <div class="col-4 font-weight-bold label-text-dark">Ville Registre de Commerce:</div>
                        <div class="col-8 value-text-light">{{$attributaire->ville_registre_de_commerce}}</div>
                    </div>

                    <div class="row mb-3 border-bottom border-grey">
                        <div class="col-4 font-weight-bold label-text-dark">CNSS:</div>
                        <div class="col-8 value-text-light">{{$attributaire->cnss}}</div>
                    </div>

                    <div class="row mb-3 border-bottom border-grey">
                        <div class="col-4 font-weight-bold label-text-dark">Ville CNSS:</div>
                        <div class="col-8 value-text-light">{{$attributaire->ville_cnss}}</div>
                    </div>

                    <div class="row mb-3 border-bottom border-grey">
                        <div class="col-4 font-weight-bold label-text-dark">Patente:</div>
                        <div class="col-8 value-text-light">{{$attributaire->patente}}</div>
                    </div>
                    <div class="row">
                        <a href="{{ route('attributaires.edit', $attributaire->id) }}"
                           class="btn btn-sm btn-primary w-25">Modifier</a>
                    </div>
                @else
                    <div class="text-center">
                        <h6 class="text-dark">Aucun attributaire pour le moment</h6>
                        <a href="{{ route('attributaires.create', ['marche_id' => $marche->id]) }}"
                           class="btn btn-sm btn-primary ml-2 w-50">Créer un attributaire</a>
                    </div>
                @endif
            </div>
        </div>


        <div class="card mb-4">
            <div class="card-header bg-dark text-light">
                <h4 class="label-text-lighter">Prix</h4>
            </div>
            <div class="card-body">
                @if ($prixList->isEmpty())
                    <h6 class="text-dark">Aucun prix n'est ajouté</h6>
                @else
                    <div class="row">
                        @foreach ($prixList as $prix)
                            <div class="col-6 mb-3">
                                <div class="card custom-square-card">
                                    <div class="card-body">
                                <span class="font-weight-bold text-dark">
                                    <strong>Numero:</strong> {{$prix->numero}}
                                </span>
                                        <hr>
                                        <span class="font-weight-bold text-dark">
                                    <strong>Designation:</strong> {{$prix->designation}}
                                </span>
                                        <hr>
                                        <span class="font-weight-bold text-dark">
                                    <strong>Quantité:</strong> {{$prix->quantite}}
                                </span>
                                        <hr>
                                        <span class="font-weight-bold text-dark">
                                    <strong>Prix unitaire:</strong> {{$prix->prix_unitaire}}
                                </span>
                                        <hr>
                                        <span class="font-weight-bold text-dark">
                                    <strong>Catégorie prix:</strong> {{$prix->categorie_prix}}
                                </span>
                                        <div class="d-flex justify-content-between mt-3">
                                            <a href="{{ route('prix.edit', ['id' => $prix->id]) }}"
                                               class="btn btn-sm btn-primary" title="Modifier">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('prix.destroy', ['id' => $prix->id]) }}" method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
