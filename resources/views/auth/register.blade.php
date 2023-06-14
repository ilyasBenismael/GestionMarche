@extends('layouts.app')

@section('content')
<style>
    .card-body .input:-webkit-autofill{
        background: transparent;
        color: var(--sunset-color);
    }
    .card-body input[type='text'],
    .card-body input[type='email'],
    .card-body input[type='password']{
        width: 87%;
        background: transparent;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 1px solid var(--sunset-color);
        border-radius: 0;
        transition: all 0.3s ease-in-out;
        color: var(--sunset-color);
    }
    .card-body input:focus{
        box-shadow: none;
        border: 1px solid var(--sunset-color);
    }
    .myBtn button{
        background: var(--sunset-color);
        color: white;
        border: 1px solid var(--sunset-color);
        border-radius:10px;
        width: 40%;
        padding: 5px 0;
        font-size: 25px;
        transition: all 0.3s ease-in-out;

    }
    .myBtn button:hover{
        background: #b57238;
        border: 1px solid #b57238;

    }
    .myBtn2{
        text-align: center;
    }
    .myBtn2 button{
        text-align: center;
        background: var(--sunset-color);
        color: white;
        border: 1px solid var(--sunset-color);
        border-radius: 10px;
        /* width: 40%; */
        padding: 5px 35px;
        font-size: 20px;
        transition: all 0.3s ease-in-out;
    }
    .myBtn2 button:hover{
        background: #b57238;
        border: 1px solid #b57238;
    }

    .profile-photo {
        border: 2px solid var(--sunset-color);
        display: inline-block;
        position: relative;
        width: 150px;
        height: 150px;
        overflow: hidden;
        border-radius: 50%;
    }

    .profile-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-photo input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
    .custom-file {
        position: relative;
        display: inline-block;
        width: 180px;
    }

    .custom-file-input {
        opacity: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        cursor: pointer;
    }

    .custom-file-label {
        display: inline-block;
        width: 100%;
        padding: 8px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

</style>
    <div class="container">
        <div class="row justify-content-around">
            <div class="col-md-7">
                <div class="card" style="border: 2px solid var(--sunset-color);">
                    <div class="card-header" style="background: var(--sunset-color);color: var(--color-light);text-align: center;padding: 20px 0;font-size: 45px;border-bottom: 2px solid var(--sunset-color)">{{ __('Register') }}</div>

                    <div class="card-body" style="background: var(--color-night);color: var(--color-light)">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" style="text-align: center">
                            @csrf

                            <div class="profile-photo">
                                <img id="preview-image" src="#" >
                                <input type="file" id="image" name="image" onchange="previewImage(event)">
                                <p style="position: absolute;top: 42%;left: 7%;" >Ajouter Une Photo</p>
                            </div>

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror


                            <div class="">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>

                                <div class="">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>

                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                                <div class="">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="">
                                <label for="password-confirm" class="col-md-4 col-form-label">{{ __('Confirm Password') }}</label>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            <div class="">
                                <label for="city" class="col-md-4 col-form-label">city</label>

                                <div class="">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" name="city" >

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div style="">
                                <label for="cv" style="display: block;cursor: pointer">Ajouter Votre CV:</label>
                                <div class="custom-file">
                                    <input type="file" id="cv" name="cv" class="custom-file-input" onchange="displayFileName(event)" style="cursor: pointer">
                                    <span id="file-label" class="custom-file-label" style="cursor: pointer;color: var(--color-night);">Choisir un fichier</span>
                                </div>
                            </div>

                            @error('cv')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="">
                                <label for="role" class="">role</label>
                                <div class="allRoles">
                                    @foreach ($roles as $role)
                                        <input type="radio" name="role" value="{{ $role->name }}" id="{{ $role->name }}">
                                        <label for="{{ $role->name }}">{{ $role->name }}</label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="myBtn">
                                    <button type="submit" class="" >
                                        {{ __('Register') }}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


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


    <div class="importUsers" style="margin-top: 20px">
        <form method="POST" action="/importUsers" enctype="multipart/form-data">
            @csrf
            <div style="text-align: center">
                <label for="excel" style="display: block;cursor: pointer;color: var(--sunset-color)"><h4>Ajouter un ensemble d'utilisateur sous forme excel</h4></label>
                <div class="custom-file">
                    <input type="file" id="excel" name="excel" class="custom-file-input" onchange="displayFileName2(event)" style="cursor: pointer">
                    <span id="file-label2" class="custom-file-label" style="cursor: pointer;color: var(--color-night);margin: 0 0 8px">Choisir un fichier</span>
                </div>
            </div>
            <div class="myBtn2">
                <button type="submit" class="">
                   register
                </button>
            </div>
        </form>
    </div>
@endsection

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview-image');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function displayFileName(event) {
        var fileInput = event.target;
        var fileName = fileInput.files[0].name;
        var fileLabel = document.getElementById('file-label');
        fileLabel.textContent = "Fichier chargé: " + fileName;
    }

    function displayFileName2(event) {
        var fileInput = event.target;
        var fileName = fileInput.files[0].name;
        var fileLabel = document.getElementById('file-label2');
        fileLabel.textContent = "Fichier chargé: " + fileName;
    }


</script>

