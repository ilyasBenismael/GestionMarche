<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!--Font Awesome-->
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <!--Font Awesome-->
    <!--Bootstrap-->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <!--Bootstrap-->
    <!--Style Css-->
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <!--Style Css-->
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Google Fonts-->
</head>
<body class="body" id="body">

<div class="card">

    <div class="checkboxess">

        <div class="checkboxes">
            <input type="checkbox" id="toggleCheckbox" checked>

            <label for="toggleCheckbox" class="checkbox">
                <div class="checkbox__inner">
                    <div class="green__ball"></div>
                </div>
            </label>
            <div class="checkbox__text">
                <span>Water Ripple </span>
                <div class="checkbox__text--options">
                    <span class="off">off</span>
                    <span class="on">on</span>
                </div>
            </div>
        </div>



    </div>

    <div class="card-header">{{ __('Login') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div >
                <label  for="email" class="email">{{ __('Email Address') }}</label>

                <div >
                    <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="">
                <label for="password" class="password">{{ __('Password') }}</label>

                <div class="">
                    <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="">
                <div class="">
                    <div class="form-check">
                        <input class="check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="footer-section">
                <div class="login-btn">
                    <button type="submit">
                        {{ __('Login') }}
                    </button>
                </div>
                <div class="forgot-pass">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>







<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>
<script src="{{ asset('/css/bootstrap.min.css') }}"></script>
<script src="{{ asset('/js/login.js') }}"></script>
</body>
</html>
