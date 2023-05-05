@extends('layouts.app')

@section('content')

    <form action="/users" method="GET">
    @csrf
    <label for="criteria">criteria</label>

        <div class="form-group form-float">
            <div class="form-line">
                <select name="criteria" id="criteria" class="form-control">
                    <option value="name">name</option>
                    <option value="city">city</option>
                    <option value="role">role</option>
                </select>
            </div>
        </div>
    <input value="{{ old('words') }}" type="text" id="words" name="words">
    <button type="submit">filter</button>
    </form>

    <table border="1px" >
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
        </tr>
        @foreach($users as $user)
            <tr>
                <td>
                    <img src="{{ asset('images/profils/' . $user->image) }}" alt="PROFIL IMAGE" class="profilPic">
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
                    <a href="{{ public_path('images/cvs/'.$user->cv) }}"> {{$user->cv}}</a>
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

            </tr>
        @endforeach
    </table>

    <div>
            <a href="/register">add user</a>
    </div>


@endsection
