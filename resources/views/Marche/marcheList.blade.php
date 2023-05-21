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
                <td>
                    <a href="/marche/{{$marche->id}}">edit marche</a>
                </td>
                <td>
                    <form action="{{ route('marche.destroy', ['id' => $marche->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <a href="/attachement/create/{{$marche->id}}">Create attachement</a>
                </td>
                <td>
                    <a href="/prix/create/{{$marche->id}}">Create prix</a>
                </td>
                <td>
                   <button>
                       renseigner les dates
                   </button>
                </td>
            </tr>
        @endforeach
    </table>


    <a href="{{ route('attributaires.show', 1) }}">View Attributaire</a>
    <a href="{{ route('attributaires.create') }}">Create Attributaire</a>
    <a href="{{ route('attributaires.edit', 1) }}">Edit Attributaire</a>


@endsection
