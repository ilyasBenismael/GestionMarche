@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-end">city</label>

                                <div class="col-md-6">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" name="city" >

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


{{--                            <div class="row mb-3">--}}
{{--                                <label for="role" class="col-md-4 col-form-label text-md-end">role</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="role" type="number" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}" name="role" >--}}

{{--                                    @error('role')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}



{{--                                <label for="role">role</label>--}}
{{--                                    <select  id="role" name="role">--}}
{{--                                        <option value="Select a role">Select a role</option>--}}
{{--                                        @foreach ($roles as $role)--}}
{{--                                            <option value="{{ $role->name }}">{{ $role->name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}

                            <div>
                                <label for="image">Choose an image to upload:</label>
                                <input type="file" id="image" name="image">
                            </div>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div>
                                <label for="cv">Choose ur cv to upload:</label>
                                <input type="file" id="cv" name="cv">
                            </div>
                            @error('cv')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="row mb-3">
                                <label for="role" class="col-md-4 col-form-label text-md-end">role</label>
                                @foreach ($roles as $role)
                                    <input type="radio" name="role" value="{{ $role->name }}" id="{{ $role->name }}">
                                    <label for="{{ $role->name }}">{{ $role->name }}</label>
                                @endforeach
                            </div>

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


    <form method="POST" action="/importUsers" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="excel">import users from excel file</label>
            <input type="file" id="excel" name="excel">
        </div>
        <button type="submit" class="btn btn-primary">
           register
        </button>
    </form>
@endsection



