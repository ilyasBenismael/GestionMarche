<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marche Wilaya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
        /* Custom font styles */
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            font-weight: 400;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
        }
        .nav-link {
            font-size: 18px;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary w-100">
        <div class="container">
            <a class="navbar-brand">Updating password</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="navbar-brand" href="/users"><--Go back to users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <form method="POST" action="/ChangePassword/{{$user->id}}">
        @csrf
        <div>
        <label for="current_password">Current Password:</label>
        <input type="password" id="current_password" name="current_password" required>
        @error('current_password')
        <span>{{ $message }}</span>
        @enderror
        </div>
        <div>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
        <span>{{ $message }}</span>
        @enderror
        </div>
        <div>
        <label for="password_confirmation">Confirm New Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit">Update Password</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
