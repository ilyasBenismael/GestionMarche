<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Gestion du Marché</title>


    <!------------------------------------------------------>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <!------------------------------------------------------>
    <!--Font Awesome-->
    <link rel="stylesheet" href="../../css/all.min.css">
    <link rel="stylesheet" href="../../css/fontawesome.min.css">
    <!--Font Awesome-->
    <!--Bootstrap-->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <!--Bootstrap-->
    <!--Style Css-->

    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <!--Style Css-->
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--Google Fonts-->


</head>

<body >
<!-- Page Style -->




<nav class="menu" tabindex="0">
    <div class="smartphone-menu-trigger"></div>
    <header class="avatar">
        <!-- User Info -->
        <div class="user-info">
            @auth()
                <div class="image">
                    <img src="{{ asset('images/profile.jpg') }}" width="90" height="90" alt="User" />
                </div>
                <div class="info-container">
                    <div  class="name {{ strtolower(auth()->user()->name) === 'superviseur' ? 'admin' : '' }}{{ strtolower(auth()->user()->name) === 'cadre' ? 'cadre' : '' }}{{ strtolower(auth()->user()->name) === 'consultant' ? 'consultant' : '' }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</div>

                    <div class="email" style="color: var(--color-light);">{{auth()->user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="fa-solid fa-chevron-down" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="color: var(--color-light);"></i>
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
    </header>
    <ul class="activities menu-hover-fill flex flex-col items-start leading-none text-2xl uppercase space-y-4">
        <li class="header" style="color: var(--color-light);">Activities</li>
        <li class="active">
            <a href="/home">
                <i class="fa-solid fa-house"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-shop"></i>
                <span>Marchés</span>
            </a>
        </li>


        @if(auth()->check() && auth()->user()->role=='admin')
            <li class="header" style="color: var(--color-light);">Admin Activities </li>
            <li>
                <a href="/users">
                    <i class="fa-solid fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a href="/roles">
                    <i class="fa-solid fa-unlock"></i>
                    <span>Roles</span>
                </a>
            </li>
            <li>
                <a href="/typeMarche" >
                    <i class="fa-brands fa-font-awesome"></i>
                    <span>Type de Marchés</span>
                </a>
            </li>
            <li>
                <a href="/categoriesPrix">
                    <i class="fa-solid fa-tag"></i>
                    <span>Categories prix</span>
                </a>
            </li>
        @endif
    </ul>

    <!-- Footer -->
    <div class="legal">
        <div class="copyright" style="color: var(--color-light);">
             Wilaya - Gestion de marché. <br> &copy; 2023 - 2024
        </div>
        <div class="version" style="color: var(--sunset-color)">
            <br><b>Version : </b> <em>1.0.0</em>
        </div>
    </div>
    <!-- #Footer -->
</nav>

<nav class="navbar">
    <div class="col-4">
        <i class="fa-solid fa-angles-right" style="color: var(--color-light);"></i> <!--fa-beat-fade-->
    </div>
    <div class="col-4">
        <a class="header" style="color: var(--color-light);">Alwilaya Marrakech - Marché</a>
    </div>
    <div class="nightmode tumbler-wrapper col-1" >
        <div class="wrapper ">
            <input type="checkbox" name="checkbox" class="switch icon">
        </div>
    </div>
</nav>

<main class="content">
    @yield('content')
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown button
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </div>
</main>




<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
<script src="{{ asset('path/to/jquery.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>

@yield("scripts")

</body>





</html>
