@extends('Dashboard.home')

@section('title', ' Update Schedual Date') <!-- Set the page title dynamically -->

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


        <h2> Update Schedual Date</h2>
        <form
            class="signup"
            id="form"
            action="{{ route('admin.date.update', $schedual_date->id) }}"
            method="POST"
        >
            @csrf
            @method('PUT')

            <label for="day"> Days</label>
            <input
                id="day"
                name="day"
                value="{{ $schedual_date->day }}"
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
                value="{{ $schedual_date->time }}"
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
