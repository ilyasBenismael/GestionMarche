<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Gestion du Marché</title>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>

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

    <style>
        .profilPic{
            width: 60px;
            height: 60px;
        }
        .custom-bg-color {
            background-color: #eaeaea;
        }

        a.btn.custom-grey2 {
            background-color: #4f4f4f;

        }

        a.btn.custom-grey2:hover {
            background-color: #0a0a0a;

        }

         .custom-input {
             border: 1px solid black;
             padding: 8px;
             border-radius: 4px;
         }

        .custom-file-input {
            border: 1px solid black;
            padding: 8px;
            border-radius: 4px;
            background-color: white;
        }
        .label-text-dark {
            color: #333; /* Change the color to your desired darker label color */
            font-size: 14px; /* Change the font size to your desired value */
            font-weight: bold; /* Change the font weight to your desired value */
        }

        .value-text-light {
            color: #555; /* Change the color to your desired lighter value color */
            font-size: 18px; /* Change the font size to your desired value */
            font-weight: normal; /* Change the font weight to your desired value */
        }

        .value-text-lighter {
            color: #555; /* Change the color to your desired lighter value color */
            font-size: 18px; /* Change the font size to your desired value */
            font-weight: bold; /* Change the font weight to your desired value */
        }


    </style>

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
                    <i class="fa-solid fa-bell notification"></i> <!-- fa-shake -->
                    <img src={{ asset('files/profils/'.auth()->user()->image)}} alt="User" />
                </div>
                <div class="info-container">
                    <div  class="name {{ strtolower(auth()->user()->role) === 'admin' ? 'admin' : '' }}{{ strtolower(auth()->user()->role) === 'cadre' ? 'cadre' : '' }}{{ strtolower(auth()->user()->role) === 'consultant' ? 'consultant' : '' }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->role}}</div>
                    <div class="email" style="color: var(--color-light);">{{auth()->user()->email}}</div>
                    <!-- Custom Dropdown Menu -Start- -->
                    <div class="dropdown" onclick="toggleDropdown()" style="width: 100%">
                        <i class="fa-solid fa-chevron-up dropdown-btn rotate"  id="dropdownArrow" style="color: var(--color-light);"></i>
                        <ul class="dropdown-content" id="dropdownContent">
                            <li class="dropdown-elmt">
                                <a href="#">
                                    <i class="fa-solid fa-user"></i>
                                    <span>Voir mon profil</span>
                                </a>
                            </li>
                            <li class="dropdown-elmt">
                                <a href="#">
                                    <i class="fa-solid fa-shop-lock"></i>
                                    <span>Mes Marchés</span>
                                </a>
                            </li>
                            <li class="dropdown-elmt">
                                <a href="#">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span>Editer mon profil</span>
                                </a>
                            </li>
                            <li class="dropdown-elmt">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="signout">
                                    <span>Sign Out</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- Custom Dropdown Menu -End- -->
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
            <a href="/marchelist">
                <i class="fa-solid fa-shop"></i>
                <span>Marchés</span>
            </a>
        </li>


        @if(auth()->check() && auth()->user()->role=='admin')
            <li class="header" style="color: var(--color-light);">Admin Activities </li>
            <li>
                <a href="/users">
                    <i class="fa-solid fa-users"></i>
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
        <div class="effectpage">
            <a href="/effects"><i class="fa-solid fa-angles-right" style="color: var(--color-light);"></i></a> <!--fa-beat-fade-->
            <span class="effects">Effets</span>
        </div>
    </div>
    <div class="col-4">
        <a class="header" style="color: var(--color-light);" href="/home">Alwilaya Marrakech - Marché</a>
    </div>
    <div class="nightmode tumbler-wrapper col-2" style="text-align: end">
        <div class="wrapper ">
            <input type="checkbox" name="checkbox" class="switch icon">
        </div>
    </div>
</nav>

<main class="content" id="app">
    <div id="content-container">

    @yield('content')
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
<script src="{{ asset('/dist/jquery.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/effects.js') }}"></script>

@yield("scripts")
</body>





</html>
