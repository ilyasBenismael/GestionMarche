@extends('layouts.app')


@section('content')
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <div class="container">

        <table class="table" id="dataTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Type</th>
                <th><a href="/typeMarche/create">Add Type</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($typeMarche as $index =>$marche )
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$marche->type}}</td>
                    <td>
                        <a href="{{route("typeMarche.show", ['id' => $marche->id])}}" class="btn btn-sm btn-primary">
                            Show
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('typeMarche.edit', ['id' => $marche->id]) }}" class="btn btn-sm btn-warning">
                            Edit
                            <i class="fas fa-edit"></i>
                        </a>
                        <form id="deleteType" action="{{route('typeMarche.destroy',['id' => $marche->id])}}" method="post">
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



