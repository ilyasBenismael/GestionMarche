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

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .conversation {
            background-color: #f2f2f2;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .conversation-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #fff;
            z-index: 999;
        }

        .user-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .message {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .message .bubble {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 20px;
            max-width: 70%;
        }


        .message .sender {
            background-color: #b4c0e8;
            align-self: flex-start;
            color: #111111;
        }

        .message .receiver {
            background-color: #a2d3a2;
            align-self: flex-end;
            color: #111111;
        }

        .message .time {
            font-size: 12px;
            color: #625e5e;
            margin-top: 5px;
            align-self: flex-end;
        }

        .input-area {
            display: flex;
            align-items: center;
            margin-top: 20px;
            height: 80px;
            margin-bottom: 5px;
        }

        .input-area input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-area button {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

    </style>
    <script>
        function scrollToBottom() {
            window.scrollTo(0, document.body.scrollHeight);
        }

        // Run the scrollToBottom function when the page finishes loading
        window.addEventListener("load", function() {
            scrollToBottom();
        });

        function validateMessage(event) {
            var content = document.querySelector('input[name="context"]').value;
            if (content.trim() === '') {
                event.preventDefault();
            }
        }
    </script>

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
    <div class="conversation">
        <div class="conversation-header">
            <img src="{{ asset('files/profils/' . $user->image) }}" alt="PROFIL IMAGE" class="user-image">
            <h2 class="user-name">{{ $user->name }}</h2>
        </div>
        @foreach ($messages as $message)
            <div class="message">
                <div class="bubble {{ $message->sender == auth()->id() ? 'sender' : 'receiver' }}">
                    {{ $message->msg }}
                    <div class="time">
                        {{ $message->created_at->format('Y-m-d H:i') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <form id="messageForm" method="POST" action="{{ route('sendMessage', ['chatid' => $chatid, 'hisid' => $user->id]) }}">
        @csrf
        <div class="input-area">
            <input type="text" name="context" placeholder="Type a message..." required autocomplete="off">
            <button type="submit">Send Message</button>
        </div>
    </form>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#messageForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            var message = $('input[name="context"]').val(); // Get the message input value

            $.ajax({
                type: 'POST',
                url: '{{ route('sendMessage', ['chatid' => $chatid, 'hisid' => $user->id]) }}',
                data: {
                    context: message
                },
                success: function(response) {
                    if (response.success) {
                        $('input[name="context"]').val(''); // Clear the message input

                        // Update the chat interface with the new message and timestamp
                        var newMessage = '<div class="message">' +
                            '<div class="bubble sender">' +
                            message +
                            '<div class="time">' + response.timestamp + '</div>' +
                            '</div>' +
                            '</div>';

                        $('.conversation').append(newMessage);
                        scrollToBottom(); // Scroll to the bottom of the conversation
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });

    function scrollToBottom() {
        window.scrollTo(0, document.body.scrollHeight);
    }

    window.addEventListener("load", function() {
        scrollToBottom();
    });
</script>



</body>

</html>
