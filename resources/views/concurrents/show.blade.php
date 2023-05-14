@extends('layouts.app')


@section('content')

    <div>
        <h2>Show</h2>
    </div>

    <div class="card-body">
            <div class="form-group">
                <label for="type" class="marche">Type</label>
                <input type="text" disabled class="form-control rounded-0" placeholder="Type"  name="type" value="{{$typeMarche->type}}">
            </div>
    </div>
@endsection
