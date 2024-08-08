<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Form_CSS/success_messages.css') }}">
    <title>Success</title>
</head>

<body>
    <div class="message">
        <img src="/images/check (1).png" alt="photo">
        <h1 class="succsess">SUCCSESS</h1>
        <p class="text1">Your Data Has Been Succesfully Submitted. Thanks!</p>

        <a href="{{ route('main_page') }}" class="home">OK</a>

    </div>
</body>

</html>
