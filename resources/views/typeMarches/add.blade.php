@extends('layouts.app')


@section('content')

    <div>
        <h2>Add New</h2>
    </div>
    @include('layouts.alert') <!-- error handling -->

    <div class="card-body">
        <form action="{{route('typeMarche.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="type" class="marche">Type</label>
                <input type="text" class="form-control" placeholder="Type"  name="type" value="{{old('type')}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
