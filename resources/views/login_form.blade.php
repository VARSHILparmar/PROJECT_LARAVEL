{{-- {{dd(Session::all())}} --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Form_CSS/log_in.css') }}">
    <title>LOG IN</title>
</head>

<body>
    <div class="log-in">
        <form action="{{ route('log_in') }}" method="POST">
            @csrf
            <h1>LOG IN</h1>
            <label for="Username">USERNAME</label>
            <input type="text" name="email" id="Username">
            <span>
                @error('email')
                    {{ $message }}
                @enderror
            </span>
            <br>
            <label for="Password">PASSWORD</label>
            <input type="password" name="password" id="Password">
            <span>
                @error('password')
                    {{ $message }}
                @enderror
            </span>
            <button type="submit">Log In</button>
            <p>Don't have Registered? <a href="{{ route('registration_page') }}">Register</a></p>
        </form>
    </div>
</body>

</html>
