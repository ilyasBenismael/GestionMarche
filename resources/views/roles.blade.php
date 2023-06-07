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
                <a href="/addRole" class="textt">Add Role</a>
            </div>
        </div>
    </div>


    <div class="containerr" style="margin: 0 22px">
        <table class="table night-mode" id="dataTable">
            <thead>
            <tr>
                <th>name</th>
                <th>action</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
<tr>
                <td>{{$role->name}}</td>
                <td>
                        <form action="/role/{{$role->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="confirmDelete(event, {{ $role->id }})">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                <td></td>
</tr>
            @endforeach
            </tbody>
        </table>
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
                    axios.delete('/role/' + id)
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
