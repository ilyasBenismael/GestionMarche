


@extends('layouts.app')


@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

    <div class="container">
        <table class="table night-mode" id="dataTable">
            <tr>
                <th>
                    name
                </th>
                <th>
                    action
                </th>
                <th>
                    <a href="/addRole">add Role</a>
                </th>
            </tr>
            @foreach($roles as $role)
                <tr>
                    <td>
                        {{$role->name}}
                    </td>
                    <td>
                        <form action="/role/{{ $role->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
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
