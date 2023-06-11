<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Gestion du Marché</title>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.css">
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
            background-color: #d7d7d7;
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




<nav class="menu " tabindex="0" id="menu">
    <header class="avatar" id="avatar">
        <!-- User Info -->
        <div class="user-info">
            @auth()
                <div class="image">
                    <img src={{ asset('files/profils/'.auth()->user()->image)}} alt="User" style="width: 100px;height: 100px" />
                </div>
                <div class="info-container">
                    <div id="dropdownNotif" style="display: flex;justify-content: center;align-items: center;" class="name {{ strtolower(auth()->user()->role) === 'admin' ? 'admin' : '' }}{{ strtolower(auth()->user()->role) === 'cadre' ? 'cadre' : '' }}{{ strtolower(auth()->user()->role) === 'consultant' ? 'consultant' : '' }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span style="cursor: pointer">{{ auth()->user()->role }}</span>
                        <i class="fa-solid fa-bell notification" id="notificationIcon" style="position:relative;cursor: pointer">
                            <span style="border: 1px solid red;background-color: red;color: white;border-radius: 50%;position: absolute;top: -4px;font-size: 8px;padding: 2px;right: -4px;">3</span>
                        </i>
                    </div>
                    <ul class="dropdown-content-notif" id="dropdownContentNotif">
                        <li class="dropdown-elmt" style="border-bottom: 2px solid var(--color-light)">
                            <h5 style="cursor: default">Marche Numero : 7</h5>
                            <p style="margin: 0;padding: 0;line-height: 1.5;cursor: default">Le délai d'exécution est terminé, mais le marché n'est pas encore clôturé.</p>
                            <p style="margin: 0;padding: 0 3px 0 0;text-align: end;"><a href="" style="color: var(--sunset-color);cursor:pointer;">Voir Marche</a></p>
                        </li>
                        <li class="dropdown-elmt" style="border-bottom: 2px solid var(--color-light)">
                            <h5 style="cursor: default">Marche Numero : 3</h5>
                            <p style="margin: 0;padding: 0;line-height: 1.5;cursor: default">Le délai de garantie est terminé, mais la date de réception définitive n'a pas encore été renseignée</p>
                            <p style="margin: 0;padding: 0 3px 0 0;text-align: end;"><a href="" style="color: var(--sunset-color)">Voir Marche</a></p>
                        </li>
                        <li class="dropdown-elmt" style="border-bottom: 2px solid var(--color-light)">
                            <h5 style="cursor: default">Marche Numero : 14</h5>
                            <p style="margin: 0;padding: 0;line-height: 1.5;cursor: default">Le délai de garantie est terminé, mais la date de réception définitive n'a pas encore été renseignée.</p>
                            <p style="margin: 0;padding: 0 3px 0 0;text-align: end;"><a href="" style="color: var(--sunset-color)">Voir Marche</a></p>
                        </li>
                    </ul>
                    <div class="email" >{{auth()->user()->email}}</div>
                    <!-- Custom Dropdown Menu -Start- -->
                    <div class="dropdown" onclick="toggleDropdown()" style="width: 100%">
                        <i class="fa-solid fa-chevron-up dropdown-btn rotate"  id="dropdownArrow" ></i>
                        <ul class="dropdown-content" id="dropdownContent">
                            <li class="dropdown-elmt" >
                                <a href="/profil">
                                    <i class="fa-solid fa-user" id=""></i>
                                    <span>Voir mon profil</span>
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
        <li class="header menu-header" >Activities</li>
        <li class="active">
            <a href="/home" class="myLi">
                <i class="fa-solid fa-house"></i>
                <span>Accueil</span>
            </a>
        </li>
        <li>
            <a href="/marchelist" class="myLi">
                <i class="fa-solid fa-shop"></i>
                <span>Marches</span>
            </a>
        </li>


        @if(auth()->check() && auth()->user()->role=='admin')
            <li class="header menu-header" >Admin Activities </li>
            <li>
                <a href="/users" class="myLi">
                    <i class="fa-solid fa-users"></i>
                    <span>Utilisateurs</span>
                </a>
            </li>
            <li>
                <a href="/roles" class="myLi">
                    <i class="fa-solid fa-unlock"></i>
                    <span>Roles</span>
                </a>
            </li>
            <li>
                <a href="/typeMarche"  class="myLi">
                    <i class="fa-brands fa-font-awesome"></i>
                    <span>Type de Marchés</span>
                </a>
            </li>
            <li>
                <a href="/categoriesPrix" class="myLi">
                    <i class="fa-solid fa-tag"></i>
                    <span>Categories prix</span>
                </a>
            </li>
        @endif
    </ul>
    <div>

    </div>
    <!-- Footer -->
    <div class="legal">
        <div class="copyright menu-header">
            Wilaya - Gestion de marché. <br> &copy; 2023 - 2024
        </div>
        <div class="version" style="color: var(--sunset-color)">
            <br><b>Version : </b> <em>1.0.0</em>
        </div>
    </div>
    <!-- #Footer -->
</nav>

<nav class="navbar" id="navbar">
    <div class="col-4">
        <div class="effectpage">
            <a href="/effects"><i class="fa-solid fa-angles-right menu-header iconEffects" ></i></a> <!--fa-beat-fade-->
            <span class="effects">Effets</span>
        </div>
    </div>
    <div class="col-4">
        <a class="headerAlwilaya menu-header"  href="/home">Alwilaya Marrakech - Marché</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>

<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="{{ asset('js/jquery-jvectormap-2.0.5.min.js') }}"></script>
<script src=" {{ asset('js/MA_jvm.js') }}" ></script>

<script src="{{ asset('/dist/jquery.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/effects.js') }}"></script>
@include('sweetalert::alert')

@yield("scripts")
</body>





</html>
