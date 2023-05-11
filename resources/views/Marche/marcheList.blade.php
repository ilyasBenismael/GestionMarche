@extends('layouts.app')

@section('content')

    <a href="/addMarche">Add Marche</a>

    <table border="1px">
    <tr>
        <th>
            numero
        </th>
        <th>
            statut
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
        </tr>
        @endforeach
        </table>
@endsection
