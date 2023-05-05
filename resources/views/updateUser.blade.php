{{--@extends('layouts.app')--}}

{{--@section('content')--}}


    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marche Wilaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        /* Custom font styles */
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
        }

        .nav-link {
            font-size: 18px;
            font-weight: 500;
        }
    </style>

</head>
<body>

<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary w-100">
        <div class="container">
            <a class="navbar-brand">Updating {{$user->name}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="navbar-brand" href="/users"><--Go back to users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update</div>

                <div class="card-body">
                    <form method="POST" action="/user/{{$user->id}}" enctype="multipart/form-data"
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{$user->email}}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="city" class="col-md-4 col-form-label text-md-end">city</label>

                        <div class="col-md-6">
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                   value="{{$user->city}}" name="city">

                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="role" class="col-md-4 col-form-label text-md-end">role</label>
                        @foreach ($roles as $role)
                            @if($user->role==$role->name)
                                <input checked type="radio" name="role" value="{{ $role->name }}"
                                       id="{{ $role->name }}">
                            @else
                                <input type="radio" name="role" value="{{ $role->name }}" id="{{ $role->name }}">
                            @endif
                            <label for="{{ $role->name }}">{{ $role->name }}</label>
                        @endforeach
                    </div>

                    <div>
                        <label for="image">new image </label>
                        <div>
                        <input type="file" id="image" name="image">
                        </div>
                    </div>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                    @enderror

                    <div>
                        <label for="cv">new cv </label>
                        <div>
                        <input type="file" id="cv" name="cv">
                        </div>
                    </div>
                    @error('cv')
                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                    @enderror

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

</body>
</html>
{{--@endsection--}}



