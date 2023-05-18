@extends('layouts.app')


@section('content')

    <div>
        <h2>Add New</h2>
    </div>
    @include('layouts.alert') <!-- error handling -->

    <div class="card-body">
        <form action="{{route('attachement.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="date" class="date">Date</label>
                <input type="date" class="form-control" placeholder="date"  name="date" value="{{old('date')}}">
            </div>
            <div class="form-group">
                <label for="marche" class="marche">Marche</label>
                <input type="text" class="form-control" placeholder="marche"  name="marche" value="{{old('marche')}}">
            </div>
            <div class="form-group">
                <label for="numero" class="numero">Numero</label>
                <input type="number" class="form-control" placeholder="numero"  name="numero" value="{{old('date')}}">
            </div>
            <div class="form-group">
                <label for="montant_de_revision" class="montant_de_revision">montant de révision</label>
                <input type="number" class="form-control" placeholder="montant_de_revision"  name="montant_de_revision" value="{{old('montant_de_revision')}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
