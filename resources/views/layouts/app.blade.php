<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Gestion du Marché</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">


    <!------------------------------------------------------>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <!------------------------------------------------------>

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
</head>

<body class="theme-red">
<!-- Page Style -->





<style>

    /*--  ======================================================style="position: relative;left: 45%;"=====================  --*/
    :root {
        --bg: #1B1B1B;
        --highlights: #343434;
        --shadow: #222222;
    }
    html,body{height:100%;margin:0;width:100%;}
    body {
        /*background-color: var(--bg);*/
        transition: background-color 600ms ease;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .nightModeIcon{
    position: absolute;
        top: 20%;
        left: 45%;
    }
    #themePicker{display:none;}
    /*.themeToggle {*/
    /*    position: fixed;*/
    /*    left:20px;top:20px;*/
    /*span {*/
    /*    position: absolute;*/
    /*    user-select: none;*/
    /*    font-size: 0;*/
    /*    transition: font-size 600ms ease;*/
    /*}*/
    /*}*/

    #darkMode{color: #ffffff;}

    #themePicker:not(:checked) + .themeToggle #darkMode{
        font-size: 40px;
    }
    #themePicker:checked + .themeToggle #lightMode{
        font-size: 40px;
    }

    /*--  ===========================================================================  --*/
</style>
<!-- #END# Page Style -->

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
                    <a href="#">
                        <i class="material-icons"></i>
                        <span>Marchés</span>
                    </a>
                </li>


                @if(auth()->check() && auth()->user()->role==1)
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




<!-- Jquery Core Js -->
<script src="../../plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="../../plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="../../plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="../../plugins/raphael/raphael.min.js"></script>
<script src="../../plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="../../plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="../../plugins/flot-charts/jquery.flot.js"></script>
<script src="../../plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="../../plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="../../plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="../../plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="../../plugins/jquery-sparkline/jquery.sparkline.js"></script>


<!-- Demo Js -->
<script src="../../js/demo.js"></script>
<!-- Custom Js -->
<script src="../../js/admin.js"></script>
<script src="../../js/pages/index.js"></script>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
@yield('scripts')

<!-- Night Mode -Start- -->

<script>
    const light="#E0E0E0"
    const lightShadow="#afafaf"
    const lightHighlight="#ffffff"
    const dark="#1B1B1B"
    const darkShadow="#222222"
    const darkHighlight="#343434"

    const checkbox = document.getElementById('themePicker')
    const root = document.querySelector(':root')
    checkbox.addEventListener('change', (event) => {
        if (event.currentTarget.checked) {
            root.style.setProperty("--bg",light);
            root.style.setProperty("--highlights",lightHighlight);
            root.style.setProperty("--shadow",lightShadow);
        } else {
            root.style.setProperty("--bg",dark);
            root.style.setProperty("--highlights",darkHighlight);
            root.style.setProperty("--shadow",darkShadow);
        }
    })
</script>
<!-- Night Mode -End- -->
</body>





</html>

