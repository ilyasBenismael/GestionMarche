@extends('layouts.app')


@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">

    <div class="container">


        <table class="table night-mode" id="dataTable" >
            <tr>
                <th>
                    Profil
                </th>
                <th>
                    name
                </th>
                <th>
                    email
                </th>
                <th>
                    city
                </th>
                <th>
                    role
                </th>
                <th>
                    cv
                </th>
                <th>
                    <a href="/register">add User</a>
                </th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>
                        <img src="{{ asset('files/profils/' . $user->image) }}" alt="PROFIL IMAGE" class="profilPic">
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->city}}
                    </td>
                    <td>
                        {{$user->role}}
                    </td>
                    <td>
                        <a href="{{ public_path('files/cvs/'.$user->cv) }}"> {{$user->cv}}</a>
                    </td>
                    <td>
                        <form action="/dowload/{{ $user->cv }}" method="POST">
                            @csrf
                            <button class="btn btn-danger">download cv</button>
                        </form>
                    </td>

                    <td>
                        <a href="/user/{{ $user->id }}">update</a>
                    </td>
                    <td>
                        <a href="/ChangePassword/{{ $user->id }}">change password</a>
                    </td>

                    <td>
                        <form action="/user/{{ $user->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">delete</button>
                        </form>
                    </td>

                    <td>
                        <a href="/chat/{{$user->id}}">send message</a>
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
