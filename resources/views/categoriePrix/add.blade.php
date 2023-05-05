@extends('layouts.app')


@section('content')

    <div>
        <h2>Add New</h2>
    </div>
    @include('layouts.alert') <!-- error handling -->

    <div class="card-body">
        <form action="{{route('categoriePrix.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="marche" class="marche">Marche</label>
                <input type="text" class="form-control" placeholder="marche"  name="marche" value="{{old('marche')}}">
            </div>
            <div class="form-group">
                <label for="designation" class="designation">Designation</label>
                <input type="text" class="form-control" placeholder="designation"  name="designation" value="{{old('designation')}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
