@extends('layouts.app')

@section('content')
    <table>
        <tr>
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
        </tr>
        @foreach($users as $user)
            <tr>
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
            </tr>
        @endforeach
    </table>

    <div>

            <a href="/register">add user</a>
    </div>


@endsection
