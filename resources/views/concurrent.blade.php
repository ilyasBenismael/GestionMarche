@extends('layouts.app')


@section('content')
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <div class="container">

        <table class="table night-mode" id="dataTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>nom</th>
                <th>ville</th>
                <th>montant</th>
                <th>statut</th>
            </tr>
            </thead>
            <tbody>
            @foreach($concurrent as $index =>$cc )
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$cc->nom}}</td>
                    <td>{{$cc->ville}}</td>
                    <td>{{$cc->montant}}</td>
                    <td>{{$cc->statut}}</td>
                    <td>
                        <a href="{{route("concurrent.show", ['id' => $cc->id])}}" class="btn btn-sm btn-primary">
                            Show
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('concurrent.edit', ['id' => $cc->id]) }}" class="btn btn-sm btn-warning">
                            Edit
                            <i class="fas fa-edit"></i>
                        </a>
                        <form id="deleteType" action="{{route('concurrent.destroy',['id' => $cc->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Delete
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        @endsection
        @section('scripts')
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable( {
                        dom: 'Bfrtip',
                        buttons: [
                            'copy', 'excel', 'pdf', 'print'
                        ]
                    } );
                } );
            </script>
        @endsection

    </div>



