@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h2 class="text-center">Ajouter un Attachement</h2>
        </div>
        <div class="card-body bg-dark text-white px-4 py-3">
            @include('layouts.alert') <!-- error handling -->

            <form action="{{ route('attachement.store', ['marche' => $marche]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="date" class="date">Date</label>
                    <input type="date" class="form-control" placeholder="Date" name="date" value="{{ old('date') }}">
                </div>
                <div class="form-group">
                    <label for="numero" class="numero">Numero</label>
                    <input type="number" class="form-control" placeholder="Numero" name="numero" value="{{ old('numero') }}">
                </div>
                <div class="form-group">
                    <label for="montant_de_revision" class="montant_de_revision">Montant de révision</label>
                    @if($marche->prix_revisable === 'true')
                    <input type="number" class="form-control" placeholder="Montant de révision" name="montant_de_revision" value="{{ old('montant_de_revision') }}">
                    @else
                        <input type="number" disabled class="form-control" placeholder="Montant de révision" name="montant_de_revision" value="{{ old('montant_de_revision') }}">
                    @endif
                </div>

                <div id="quantities-container">
                    <!-- Quantity execute fields will be dynamically added here -->
                </div>

                <div class="form-group mt-4">
                    <button type="button" class="btn btn-primary" onclick="addQuantityForm()">Ajouter une quantité exécutée</button>
                </div>

                <div class="form-group mt-4 text-center">
                    <button class="btn btn-primary btn-lg" style="width: 50%;">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Styles for the form and card */
        /* ... */

        /* Styles for the dynamically added quantity execute fields */
        /* ... */
    </style>

    <script>
        function addQuantityForm() {
            var container = document.getElementById('quantities-container');
            var quantityCount = container.children.length + 1;

            var card = document.createElement('div');
            card.classList.add('card', 'mb-4');
            card.classList.add('card', 'mt-4');

            var cardHeader = document.createElement('div');
            cardHeader.classList.add('card-header', 'bg-dark', 'text-white');
            cardHeader.innerHTML = '<h2 class="text-center">Quantité exécutée ' + quantityCount + '</h2>';

            var cardBody = document.createElement('div');
            cardBody.classList.add('card-body', 'bg-dark', 'text-white', 'px-4', 'py-3');

            var label = document.createElement('label');
            label.textContent = 'Prix';

            var select = document.createElement('select');
            select.classList.add('form-control');
            select.name = 'quantities[' + quantityCount + '][prix]';

            var options = {!! $prixList->toJson() !!};
            for (var i = 0; i < options.length; i++) {
                var option = document.createElement('option');
                option.value = options[i].id;
                option.textContent = options[i].designation;
                select.appendChild(option);
            }


            var quantityLabel = document.createElement('label');
            quantityLabel.textContent = 'Quantité';

            var quantityInput = document.createElement('input');
            quantityInput.type = 'number';
            quantityInput.classList.add('form-control');
            quantityInput.placeholder = 'Quantité';
            quantityInput.name = 'quantities[' + quantityCount + '][quantite]';

            cardBody.appendChild(label);
            cardBody.appendChild(select);
            cardBody.appendChild(quantityLabel);
            cardBody.appendChild(quantityInput);

            card.appendChild(cardHeader);
            card.appendChild(cardBody);

            container.appendChild(card);
        }
    </script>
@endsection
