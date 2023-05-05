@extends('layouts.app')

@section('content')

    <a href="/addRole">add Role</a>

    <table border="1px">
        <tr>
            <th>
                name
            </th>
            <th>
                action
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
