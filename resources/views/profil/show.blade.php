
@extends('layouts.app')

@section('content')

    <style>
        .user-profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .small-circle-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid darkgrey;
            margin-bottom: 10px;
        }

        .profile-name {
            font-size: 20px;
            font-weight: bold;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
        }

        .info-card,
        .chat-card {
            flex: 1;
            border: 1px solid darkgrey;
            border-radius: 10px;
            margin-right: 10px;
            padding: 10px;
        }

        .card-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            background-color: darkgrey;
            color: white;
            padding: 5px;
            border-radius: 10px 10px 0 0;
        }

        .card-content {
            padding: 5px;
        }

        .custom-scrollbar {
            max-height: 200px;
            overflow-y: scroll;
            scrollbar-width: thin;
            scrollbar-color: darkgrey lightgrey;
        }

        .no-chats {
            text-align: center;
            color: darkgrey;
            margin-top: 20px;
        }

        .circle-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            object-position: center;
        }

        .info-item {
            display: flex;
            margin-bottom: 10px;
        }

        .show-cv-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: blue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .show-cv-button:hover {
            background-color: darkblue;
        }

        .info-label {
            font-weight: bold;
            margin-right: 5px;
        }

        .chat-bubble {
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 20px;
            background-color: #c4c4c4;
            margin-bottom: 10px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .chat-bubble:hover {
            background-color: #888888;
        }

        .chat-bubble img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            object-position: center;
            margin-right: 10px;
        }

        .chat-name {
            font-weight: bold;
        }

        .message-count {
            background-color: blue;
            color: #505050;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            text-align: center;
            font-size: 12px;
            position: absolute;
            right: 85px;
        }

        .last-message {
            color: #4d4d4d;
            font-size: 19px;
        }

        .circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #454546;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }

        .circle-number {
            font-size: 24px;
            font-weight: bold;
        }

        .notification-list {
            list-style: none;
            padding: 0;
        }

        .notification-list li {
            background-color: #505152;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
        }
    </style>




    <div class="user-profile">
        <div class="profile-picture">
            <img src="{{ asset('files/profils/'.$user->image)}}" alt="Profile Picture" class="small-circle-image">
        </div>
        <div class="profile-name">
            {{ $user->name }}
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card bg-light info-card" style="height: 500px;">
                    <div class="card-header bg-dark text-light">
                        <h4 class="font-weight-bold text-center">Infos</h4>
                    </div>

                    <div class="card-body">
                        <div class="info-item mb-3 border-bottom border-grey">
                            <div class="info-label col-4 font-weight-bold label-text-dark">Email:</div>
                            <div class="info-value col-8 value-text-light">{{ $user->email }}</div>
                        </div>

                        <div class="info-item mb-3 border-bottom border-grey">
                            <div class="info-label col-4 font-weight-bold label-text-dark">City:</div>
                            <div class="info-value col-8 value-text-light">{{ $user->city }}</div>
                        </div>

                        <div class="info-item mb-3 border-bottom border-grey">
                            <div class="info-label col-4 font-weight-bold label-text-dark">Role:</div>
                            <div class="info-value col-8 value-text-light">{{ $user->role }}</div>
                        </div>

                        <div class="info-item mb-3 border-bottom border-grey">
                            <div class="info-value col-8 value-text-light">
                                <a href={{ asset('files/cvs/'.$user->cv)}} class="show-cv-button" target="_blank">Show
                                    CV</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card bg-light chat-card" style="height: 500px;">
                    <div class="card-header bg-dark text-light">
                        <h4 class="font-weight-bold text-center">Chats</h4>
                    </div>

                    <div class="card-body custom-scrollbar">
                        @if (empty($chatList))
                            <div class="no-chats text-center">No chats yet.</div>
                        @else
                            @foreach ($chatList as $chat)
                                <div class="chat-bubble">
                                    <a href="{{ $chat['link'] }}" class="image-link">
                                        <img src="{{ asset('files/profils/'.$chat['userImage']) }}"
                                             alt="Chat User Image" class="circle-image">
                                    </a>
                                    <div>
                                        <div class="chat-name">{{ $chat['name'] }}</div>
                                        <div class="last-message">{{ $chat['last_msg'] }}</div>
                                    </div>
                                    <div class="message-count">{{ $chat['msgs_nbr'] }}</div>
                                </div>
                            @endforeach

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="circle">
            <span class="circle-number">{{ $nbr_notif }}</span>
        </div>
        <ul class="notification-list mt-4">
            @foreach ($notifications as $notification)
                <li>
                    <h4 class="notification-title">{{ $notification->title }}</h4>
                    <p class="notification-content">{{ $notification->content }}</p>
                    <a href="{{ $notification->link }}" class="btn btn-primary" target="_blank">Check Marche</a>
                </li>
            @endforeach
        </ul>
    </div>



@endsection
