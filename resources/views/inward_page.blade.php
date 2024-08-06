<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Form_CSS/inward.css') }}">
    <title>INWARD</title>
</head>

<body>
    <div class="mobile-2">

        <div class="first">
            <a href="{{ route('main_page') }}"><img src="/images/65506-200.png" alt="photo"></a>
            <h2>Inward</h2>
            {{-- {{ Auth::user() }} --}}
        </div>

        <div class="second">
            <form action="{{ route('add_inward') }}" method="POST">
                @csrf
                <div class="input">
                    <label for="date-time">Date & Time</label>
                    <input type="datetime-local" name="date_time" id="date-time" value="{{ old('date_time') }}">
                    <span style="text-align: center;">
                        @error('date_time')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="input">
                    <label for="Select">Select Quality</label>
                    {{-- <select name="select" id="Select">
                        <option value="qua1">Quality</option>
                        <option value="qua2">Quality</option>
                        <option value="qua3">Quality</option>
                    </select> --}}
                    <select name="select" id="Select">
                        @foreach ($qulitys as $qulity)
                            <option value="{{ $qulity->id }}">{{ $qulity->Quality }}</option>
                        @endforeach
                    </select>
                    <span style="text-align: center;">
                        @error('select')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="input">
                    <label for="number">Enter meter</label>
                    <input type="number" name="number" id="number" value="{{ old('number') }}"
                        placeholder="100 Meter">
                    <span style="text-align: center;">
                        @error('number')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="buttons">
                    <button type="submit" id="submit">Submit</button>
                    <button id="s-n">Submit & Next</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
