@extends('Dashboard.home')

@section('title', ' Change Home Schedual Date') <!-- Set the page title dynamically -->

@section('content')
    <!-- User Form (Hidden by Default) -->
    <div
        class="form-container"
        id="userForm"
    >
        @if (session('success'))
            <div
                class="notification success"
                id="success"
            >
                {{ session('success') }}
            </div>
        @endif

        <!-- Display Error Message -->
        @if (session('error'))
            <div
                class="notification error"
                id="error"
            >
                {{ session('error') }}
            </div>
        @endif


        <h2> Change Home Schedual Date</h2>
        <form
            class="signup"
            id="form"
            action="{{ route('admin.date.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('POST')

            <label for="day"> Days</label>
            <input
                id="day"
                name="day"
            >
            <div class="error">
                @error('day')
                    {{ $message }}
                @enderror
            </div>

            <label for="time"> Times</label>
            <input
                id="time"
                name="time"
            >
            <div class="error">
                @error('time')
                    {{ $message }}
                @enderror
            </div>

            <button type="submit">Confirm</button>
        </form>


    </div>
@endsection
