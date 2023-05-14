@extends('layouts.app')


@section('content')

    <div>
        <h2>Show</h2>
    </div>

    <div class="card-body">
            <div class="form-group">
                <label for="marche" class="marche">Marche</label>
                <input type="text" disabled class="form-control rounded-0" placeholder="marche"  name="marche" value="{{$categoriePrix->marche}}">
            </div>
            <div class="form-group">
                <label for="designation" class="designation">Designation</label>
                <input type="text" disabled class="form-control rounded-0" placeholder="designation"  name="designation" value="{{$categoriePrix->designation}}">
            </div>
    </div>
@endsection
