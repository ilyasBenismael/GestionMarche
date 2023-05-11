<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Gestion du Marché</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />
 <!-- Morris Chart Css-->
    <link href="../../plugins/morrisjs/morris.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />

    @yield("css")


<!-- Page Style -->

    <style>
    .profilPic {
        border-radius: 5px;
        width: 70px;
        height: 70px;
        object-fit: cover;
    }
    .ka{
        width: 50px;
    }
    </style>

<!-- #END# Page Style -->

</head>


<body class="theme-red">
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header" style="width: 100%">
            <a class="navbar-brand" href="#" >Alwilaya Marrakech - Marché</a>
        </div>
        <div class="nightModeIcon">
            <input type="checkbox" id="themePicker" name="themePicker">
            <label for="themePicker" class="themeToggle">
                <span class="material-symbols-outlined" id="lightMode">light_mode</span>
                <span class="material-symbols-outlined" id="darkMode">dark_mode</span>
            </label>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->

        <div class="user-info">
            @auth()
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</div>
                    <div class="email">{{auth()->user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li role="seperator" class="divider"></li>
                            <li><a href="#"><i class="material-icons">person</i>Voir mon profil</a></li>
                            <li><a href="#"><i class="material-icons">favorite</i>mes Marchés</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="#"><i class="material-icons">person</i>Editer mon profil</a></li>
                            <li> <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <i class="material-icons">input</i>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth
        </div>

        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">Activities</li>
                <li class="active">
                    <a href="/home">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="/marchelist">
                        <i class="material-icons"></i>
                        <span>Marchés</span>
                    </a>
                </li>


                @if(auth()->check() && auth()->user()->role=='admin')
                    <li class="header">Admin Activities</li>
                    <li>
                        <a href="/users">
                            <i class="material-icons"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="/roles">
                            <i class="material-icons"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                    <li>
                        <a href="/typeMarche">
                            <i class="material-icons"></i>
                            <span>Type de Marchés</span>
                        </a>
                    </li>
                    <li>
                        <a href="/categoriesPrix">
                            <i class="material-icons"></i>
                            <span>Categories prix</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2023 - 2024 <a href="javascript:void(0);">Wilaya - Gestion de marché</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>

<section class="content">
    @yield('content')
</section>

</body>

</html>
