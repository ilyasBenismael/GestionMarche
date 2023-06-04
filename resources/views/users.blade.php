@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

    <div class="container">
        <table class="table night-mode" id="dataTable">
            <thead>
            <tr>
                <th>Profil</th>
                <th>name</th>
                <th>email</th>
                <th>city</th>
                <th>role</th>
                <th>cv</th>
                <th>Actions</th>
                <th>Send Message</th>
                <th><a href="/register">add User</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <img src="{{ asset('files/profils/' . $user->image) }}" alt="PROFIL IMAGE" class="profilPic">
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->city}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        //
                        <a href="{{ asset('files/cvs/'.$user->cv) }}">{{$user->cv}}</a>
                    </td>
                    <td>
                        <form action="/dowload/{{ $user->cv }}" method="POST">
                            @csrf
                            <button class="btn btn-s btn-primary">
                                Download cv
                                <i class="fa-solid fa-download"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="/chat/{{$user->id}}" class="btn btn-info" style="color: white">send message <i class="fa-regular fa-comments"></i></a>
                    </td>
                    <td>
                        <a href="/user/{{ $user->id }}" class="btn btn-sm btn-warning middle" style="color: white">
                            Update
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="/ChangePassword/{{ $user->id }}" class="btn btn-sm btn-warning middle" style="color: white">
                            Change password
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="/user/{{ $user->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                Delete
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
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
    </script>
@endsection
