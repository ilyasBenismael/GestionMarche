@extends('layouts.app')


@section('content')



    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.24.0/dist/axios.min.js"></script>


    <style>
        .svg-wrapperr {
            height: 60px;
            margin: 0 auto;
            position: relative;
            top: 50%;
            width: 320px;
            text-align: center;
        }

        .shapee {
            fill: transparent;
            stroke-dasharray: 140 540;
            stroke-dashoffset: -474;
            stroke-width: 8px;
            stroke: var(--sunset-color);
        }

        .textt {
            color: var(--sunset-color);
            font-size: 22px;
            letter-spacing: 6px;
            line-height: 32px;
            position: relative;
            top: -48px;
            text-align: center;
            text-decoration: none;
        }

        @keyframes draw {
            0% {
                stroke-dasharray: 140 540;
                stroke-dashoffset: -474;
                stroke-width: 8px;
            }
            100% {
                stroke-dasharray: 760;
                stroke-dashoffset: 0;
                stroke-width: 2px;
            }
        }

        .svg-wrapperr:hover .shapee {
            -webkit-animation: 0.5s draw linear forwards;
            animation: 0.5s draw linear forwards;
        }
    </style>

    <div class="addmarketcontainer" style="margin: 30px 0 40px;">
        <div class="addmarket">
            <div class="svg-wrapperr">
                <svg height="60" width="320" xmlns="http://www.w3.org/2000/svg">
                    <rect class="shapee" height="60" width="320" />
                </svg>
                <a href="/categoriePrix/create" class="textt">Add Type</a>
            </div>
        </div>
    </div>


<div class="containerr" style="margin: 0 22px">

<table class="table night-mode" id="dataTable">
    <thead>
    <tr>
        <th>ID</th>
        <th>Marche</th>
        <th>Designation</th>
        <th></th>
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
                    <button type="submit" class="btn btn-sm btn-danger" onclick="confirmDelete(event, {{ $prix->id }})">
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



            function confirmDelete(event, id) {
                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                        // Send the AJAX request to delete the marche
                        axios.delete('/categoriePrix/' + id)
                            .then(function(response) {
                                // Handle the success response
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'The marche has been deleted.',
                                    icon: 'success'
                                }).then(() => {
                                    // Reload the page to reflect the updated list
                                    location.reload();
                                });
                            })
                            .catch(function(error) {
                                // Handle the error response
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'An error occurred while deleting the marche.',
                                    icon: 'error'
                                });
                            });
                    }
                });
            }
        </script>
    @endsection

</div>



