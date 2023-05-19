@extends('layouts.app')

@section('content')

    <a href="/addMarche">Add Marche</a>

    <table >
    <tr>
        <th>
            numero
        </th>
        <th>
            statut
        </th>
        <th>
            action
        </th>
    </tr>
        @foreach($marches as $marche)
            <tr>
                <td>
                    {{$marche->numero_marche}}
                </td>
                <td>
                    {{$marche->statut}}
                </td>
                <td>
                    <a href="/marche/{{$marche->id}}">show marche</a>
                </td>
            </tr>
        @endforeach

    </table>


@endsection
