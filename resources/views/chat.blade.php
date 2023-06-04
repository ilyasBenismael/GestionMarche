
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


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
            margin-left: 28px;
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
            /*padding: 20px;*/
            margin-top: 70px;
            margin-bottom: 80px;
            overflow-y: auto;
        }

        .conversation-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-left: 20px;
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
            margin-left: 20px;
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
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 80px;
            background-color: #fff;
            padding: 20px;
            box-sizing: border-box;
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
</head>
<body>


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
                    @if ($message->seen == 'true' && $message->sender == auth()->id())
                        <div class="seen-indicator">Seen</div>
                    @endif
                </div>
            @endforeach

        </div>

        <form id="messageForm" method="POST"
              action="{{ route('sendMessage', ['chatid' => $chatid, 'hisid' => $user->id]) }}">
            @csrf
            <div class="input-area">
                <input type="text" name="context" placeholder="Type a message..." required autocomplete="off">
                <button type="submit">Send Message</button>
            </div>
        </form>
    </section>






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
                                '<div class="bubble sender">' +
                                message +
                                '<div class="time">' + response.timestamp + '</div>' +
                                '</div>' +
                                '</div>';

                            $('.conversation').append(newMessage);
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
</body>
</html>

