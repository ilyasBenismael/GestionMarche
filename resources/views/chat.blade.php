@extends('layouts.app')


@section('content')
    <style>
        .profilPic {
            border-radius: 5px;
            width: 70px;
            height: 70px;
            object-fit: cover;
        }

        .seen-indicator {
            font-size: 13px;
            font-weight: bold;
            color: #676767;
            margin-top: 2px;
            margin-left: 50px;
        }
        {
            position: absolute;
            top: 15px;
            content: "";
            width: 0;
            height: 0;
            border-top: 15px solid rgba(25, 147, 147, 0.2);
        }
        {
            border-right: 15px solid transparent;
            right: -15px;
        }
        .conversation {
            background-color: var(--color-night-body);
            display: flex;
            flex-direction: column;
            margin: 10px;
            border-radius: 10px;
            border: 5px solid var(--color-night);
        }

        .conversation-header {
            padding-top: 5px;
            color: var(--color-light);
            padding-left: 20px;
            width: 100%;
            background-color: var(--color-night);
            z-index: 999;
            text-align: center;
        }

        .user-image {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .message {
            display: flex;
            flex-direction: column;
            margin: 20px 0;
            position: relative;
        }

        .message .bubble {
            display: inline-block;
            padding: 10px 20px;
            max-width: 70%;
            margin: 0 50px;
        }
/*
        .message .sender:after{

            border-left: 15px solid transparent;
            left: -15px;
            position: absolute;
            top: 15px;
            content: "";
            width: 0;
            height: 0;
            border-top: 15px solid rgba(25, 147, 147, 0.2);
        }
        */

        .message .sender {
            background-color: #b4c0e8;
            align-self: flex-start;
            color: #111111;

            border-radius: 0 20px 20px;
        }
/*
        .message .receiver:after{
            border-right: 15px solid transparent;
            right: -15px;
            position: absolute;
            top: 15px;
            content: "";
            width: 0;
            height: 0;
            border-top: 15px solid rgba(25, 147, 147, 0.2);
        }

        */
        .message .receiver {
            background-color: #a2d3a2;
            align-self: flex-end;
            color: #111111;

            border-radius: 20px 0px 20px 20px;
        }


        .message .time {
            font-size: 12px;
            color: #625e5e;
            margin-top: 5px;
            align-self: flex-end;
        }

        .input-area {
            width: 100%;
            height: 80px;
            background-color: var(--color-night);
            padding: 20px;
            box-sizing: border-box;
        }

        .input-area input[type="text"] {
            text-align: start;
            flex: 1;
            border: none;
            border-bottom: 1px solid var(--sunset-color);
            background-color: transparent;
        }

        .input-area button {
            margin-left: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: var(--sunset-color);
            color: #fff;
            cursor: pointer;
        }

    </style>

        <div class="conversation">
            <div class="conversation-header">
                <img src="{{ asset('files/profils/' . $user->image) }}" alt="PROFIL IMAGE" class="user-image">
                <h2 class="user-name">{{ $user->name }}</h2>
            </div>
            <div class="allMessages" style="overflow: scroll;max-height: 67vh">
                @foreach ($messages as $message)
                    <div class="message">
                        @if ($message->sender == auth()->id())
                            <img class="{{ $message->sender == auth()->id() ? 'sender' : 'receiver' }}" src="{{ asset('files/profils/' . auth()->user()->image) }}" alt="Sender Profile Image" style="width: 40px;height: 40px;object-fit: cover;position: absolute;border-radius: 50%;left:5px;bottom: 80%;">
                        @else
                            <img class="{{ $message->sender == auth()->id() ? 'sender' : 'receiver' }}" src="{{ asset('files/profils/' . $user->image) }}" alt="Receiver Profile Image" style="width: 40px;height: 40px;object-fit: cover;position: absolute;border-radius: 50%;right: 5px;bottom: 80%;">
                        @endif
                        <div class="bubble {{ $message->sender == auth()->id() ? 'sender' : 'receiver' }}">
                            {{ $message->msg }}
                            <div class="time">
                                {{ $message->created_at->format('Y-m-d H:i') }}
                            </div>
                        </div>
                        @if ($message->seen == 'true' && $message->sender == auth()->id())
                            <div class="seen-indicator">Seen</div>
                        @endif
                    </div>
                @endforeach
            </div>
            <form id="messageForm" method="POST"
                  action="{{ route('sendMessage', ['chatid' => $chatid, 'hisid' => $user->id]) }}">
                @csrf
                <div class="input-area row  d-flex justify-content-between" style="margin: 0">
                    <input class="col-9" type="text" name="context" placeholder="Type a message..." required autocomplete="off" style="margin: 0">
                    <button class="col-3" type="submit">Send Message</button>
                </div>
            </form>
        </div>


    @endsection
    @section('scripts')




    <script>
        function scrollToBottom() {
            window.scrollTo(0, document.body.scrollHeight);
        }

        // Run the scrollToBottom function when the page finishes loading
        window.addEventListener("load", function () {
            scrollToBottom();
        });

        function validateMessage(event) {
            var content = document.querySelector('input[name="context"]').value;
            if (content.trim() === '') {
                event.preventDefault();
            }
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#messageForm').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                var message = $('input[name="context"]').val(); // Get the message input value

                $.ajax({
                    type: 'POST',
                    url: '{{ route('sendMessage', ['chatid' => $chatid, 'hisid' => $user->id]) }}',
                    data: {
                        context: message
                    },
                    success: function (response) {
                        if (response.success) {
                            $('input[name="context"]').val(''); // Clear the message input

                            // Update the chat interface with the new message and timestamp
                            var newMessage = '<div class="message">' +
                                '<img class="sender">'+
                                '<div class="bubble sender">' +
                                message +
                                '<div class="time">' + response.timestamp + '</div>' +
                                '</div>' +
                                '</div>';

                            $('.allMessages').append(newMessage);
                            scrollToBottom(); // Scroll to the bottom of the conversation
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });

        function scrollToBottom() {
            window.scrollTo(0, document.body.scrollHeight);
        }

        window.addEventListener("load", function () {
            scrollToBottom();
        });
    </script>

@endsection

