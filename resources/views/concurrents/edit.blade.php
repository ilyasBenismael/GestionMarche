@extends('layouts.app')


@section('content')
    <div>
        <h2>Update</h2>
    </div>
    @include('layouts.alert') <!-- error handling -->
    <div class="card-body">
        <form action="{{route('typeMarche.update', $typeMarche->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="type" class="type">Type</label>
                <input type="text" class="form-control" placeholder="type"  name="type" value="{{old('type',$typeMarche->type)}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
