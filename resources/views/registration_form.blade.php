<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('Form_CSS/registration.css') }}">
    <title>REGISTRATION</title>
</head>

<body>
    <!-- <h1>REGISTRATION Form</h1> -->
    <div class="regi_form">
        <form action="{{ route('registration') }}" method="POST">
            @csrf
            <h1>REGISTRATION</h1>
            <label for="NAME">NAME : </label>
            <input type="text" name="name" id="NAME" value="{{ old('name') }}" placeholder="NAME">
            <span>
                @error('name')
                    {{ $message }}
                @enderror
            </span>
            <br>
            <label for="NUMBER">NUMBER : </label>
            <input type="number" name="number" id="NUMBER" value="{{ old('number') }}" placeholder="NUMBER">
            <span>
                @error('number')
                    {{ $message }}
                @enderror
            </span>
            <br>
            <label for="EMAIL">EMAIL : </label>
            <input type="email" name="email" id="EMAIL" value="{{ old('email') }}" placeholder="EMAIL">
            <span>
                @error('email')
                    {{ $message }}
                @enderror
            </span>
            <br>
            <label for="PASSWORD">PASSWORD : </label>
            <input type="password" name="password" id="PASSWORD" value="{{ old('password') }}" placeholder="PASSWORD">
            <span>
                @error('password')
                    {{ $message }}
                @enderror
            </span>
            <br>
            {{-- <input type="submit" name="submit" id="button"> --}}
            <button type="submit" id="button">Submit</button>
            <input type="reset" name="reset" id="button1">
            <p>Already have Registered? <a href="{{ route('log_in_page') }}">LOG-IN</a></p>
        </form>
    </div>
