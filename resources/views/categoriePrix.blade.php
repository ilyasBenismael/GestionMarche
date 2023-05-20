@extends('layouts.app')


@section('content')



    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
<div class="container">

<table class="table" id="dataTable">
    <thead>
    <tr>
        <th>ID</th>
        <th>Marche</th>
        <th>Designation</th>
        <th><a href="/categoriePrix/create">Add Type</a></th>
    </tr>
    </thead>
    <tbody>
    @foreach($categoriePrix as $index =>$prix )
        <tr>
            <td>{{$index+1}}</td>
            <td>{{$prix->marche}}</td>
            <td>{{$prix->designation}}</td>
            <td  class="linksBtn">
                <a href="{{route("categoriePrix.show", ['id' => $prix->id])}}" class="btn btn-sm btn-primary">
                    Show
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('categoriePrix.edit', ['id' => $prix->id]) }}" class="btn btn-sm btn-warning middle">
                    Edit
                    <i class="fas fa-edit"></i>
                </a>
                <form id="deleteType" action="{{route('categoriePrix.destroy',['id' => $prix->id])}}" method="post">
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



