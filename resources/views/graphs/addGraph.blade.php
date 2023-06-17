@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-header bg-dark text-white">Upload Excel File</div>

                    <div class="card-body custom-bg-color ">
                        <form action="/addGraph" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">Choose Excel File:</label>
                                <input type="file" name="file" id="file" class="form-control-file" accept=".xlsx, .xls">
                            </div>
                            @error('graph')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
