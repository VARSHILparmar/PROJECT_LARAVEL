<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Form_CSS/main_page.css') }}">
    <title>Layout</title>
</head>

<body>
    <div class="mobile-1">

        <div class="text">
            <h2>Select Type </h2>
            <form action="{{ route('log_out') }}" method="POST">
                @csrf
                <button type="submit" id="logout">
                    Log Out
                </button>
            </form>
            {{-- {{ Auth::user() }} --}}
        </div>

        <div class="maincontainer">
            <a href="{{ route('inward') }}">
                <div class="container1" id="first">
                    <figure>
                        <img src="images/imgpsh_fullsize_anim (1).jpg" alt="photo">
                        <figcaption>Inward</figcaption>
                    </figure>
                </div>
            </a>

            <a href="{{ route('outward') }}">
                <div class="container2" id="second" onclick="location.href='/TASK-2/task2.html';">
                    <figure>
                        <img src="images/imgpsh_fullsize_anim.jpg" alt="photo">
                        <figcaption>Outward</figcaption>
                    </figure>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
