@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

    <div class="addmarketcontainer" style="margin-bottom: 30px;">
        <div class="addmarket">
            <a href="/addMarche" style="text-decoration: none;font-size: 20px;margin-left: 25px;">
                <i class="fa-solid fa-shop"></i>
                <span>Ajouter Un Marché</span>
            </a>
        </div>
    </div>


    <div class="container">
        <table class="table night-mode" id="dataTable">
            <thead>
            <tr>
                <th>statut</th>
                <th>Numero Marche</th>
                <th>Exercice</th>
                <th>Montant</th>
                <th>Show Marche</th>
                <th>
                    delete
                </th>
                <th>Attachement</th>
                <th>Prix</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marches as $marche)
                <tr>
                    <td>{{$marche->statut}}</td>
                    <td>{{$marche->numero_marche}}</td>
                    <td>{{$marche->exercice}}</td>
                    <td>{{$marche->montant}}</td>
                    <td><a href="/marche/{{$marche->id}}">show marche</a></td>
                    <td>
                        <form action="{{ route('marche.destroy', ['id' => $marche->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td><a href="/attachement/create/{{$marche->id}}">Create attachement</a></td>
                    <td><a href="/prix/create/{{$marche->id}}">Create prix</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('attributaires.show', 1) }}">View Attributaire</a>
        <a href="{{ route('attributaires.create') }}">Create Attributaire</a>
        <a href="{{ route('attributaires.edit', 1) }}">Edit Attributaire</a>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'pdf', 'print']
            });
        });
    </script>
@endsection
