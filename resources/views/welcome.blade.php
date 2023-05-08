<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Font Awesome-->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <!--Font Awesome-->
    <!--Bootstrap-->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <!--Bootstrap-->
    <!--Style Css-->
    <link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">
    <!--Style Css-->
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Google Fonts-->
    <title>Gestion Marche</title>
</head>
<body>
<!-- Cercle Effect -Start- -->
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<div class="circle"></div>
<!-- Cercle Effect -End- -->
<!-- Nav Bar -Start- -->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="#">Application de Suivi des Marches Publics</a>
    <div class="collapse navbar-collapse justify-content-end" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <div class="login-section">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/home') }}" class="text  ">
                                    <i class="fa-solid fa-house"></i>
                                    Home
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text ">
                                    <i class="fa-solid fa-right-to-bracket"></i>
                                    Log in
                                </a>
                            @endauth
                        </div>
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- Nav Bar -End- -->



<div class="section1">
    <div class="header">
        <h1 class="">Bienvenue dans Notre Application de Suivi des Marches Publics</h1>
    </div>
    <div class="header-text">
        L'application de suivi des marchés publics est un outil numérique conçu pour faciliter la surveillance et la gestion des marchés publics.
        <br> Elle permet aux utilisateurs, tels que les autorités publiques, les entreprises et les citoyens, de suivre de près
        <br> les différents appels d'offres,  les contrats et les projets liés aux marchés publics.
    </div>
    <div class="btn">
        <span>
            @if (Route::has('login'))
                            @auth
                        <a href="{{ url('/home') }}" style="text-decoration: none"><span>Home</span></a>
                    @else
                        <a href="{{ route('login') }}" style="text-decoration: none"><span>Log in</span></a>
                    @endauth

            @endif
        </span>
    </div>
</div>

<script src="{{ asset('/css/bootstrap.min.css') }}"></script>
<script src="{{ asset('/js/welcome.js') }}"></script>
</body>
</html>




