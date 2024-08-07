<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Form_CSS/outward.css') }}">
    <title>OUTWARD</title>
</head>

<body>
    <div class="mobile-3">
        <div class="first">
            <a href="{{ route('main_page') }}"><img src="/images/65506-200.png" alt="photo"></a>
            <h2>Outward</h2>
        </div>
{{-- {{ $vendors }} --}}
        <div class="outward_form">
            <div class="second">
                <form action="{{ route('add_outward') }}" method="POST">
                    @csrf
                    <div class="input">
                        <label for="Select">Select Vendor</label>
                        <select name="select_vender" id="Select">
                            <option value="" selected disabled hidden>Vendors</option>
                            @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" @if (old('select_vender') == $vendor->id) selected="selected" @endif> {{ $vendor->name }} </option>
                            @endforeach
                        </select>
                        <span>
                            @error('select_vender')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="input">
                        <label for="date-time">Date & Time</label>
                        <input type="datetime-local" name="date_time" id="date-time" value="{{ old('date_time') }}">
                        <span>
                            @error('date_time')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="input">
                        <label for="Select1">Select Quality</label>
                        {{-- <select name="selectq" id="Select">
                        <option value="qua1">Quality</option>
                        <option value="qua2">Quality</option>
                        <option value="qua3">Quality</option>
                    </select> --}}
                        <select name="select" id="Select1">
                            <option value="" selected disabled hidden>Quality</option>
                            @foreach ($qulitys as $qulity)
                                <option value="{{ $qulity->id }}" {{ (collect(old('select'))->contains($qulity->id)) ? 'selected':''}}>{{ $qulity->Quality }}</option>
                            @endforeach
                        </select>
                        <span>
                            @error('select')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="input">
                        <label for="number">Enter meter</label>
                        <input type="number" name="number" id="number" value="{{ old('number') }}"
                            placeholder="100 Meter">
                        <span>
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
    </div>
    </div>
</body>

</html>
