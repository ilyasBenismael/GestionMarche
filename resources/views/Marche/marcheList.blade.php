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
        <th>
            attachement
        </th>
        <th>
            prix
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
                <td>
                    <a href="/attachement/create/{{$marche->id}}">Create attachement</a>
                </td>
                <td>
                    <a href="/prix/create/{{$marche->id}}">Create prix</a>
                </td>
            </tr>
        @endforeach


    </table>


@endsection
