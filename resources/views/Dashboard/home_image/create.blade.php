@extends('Dashboard.home')

@section('title', ' Change Home Image') <!-- Set the page title dynamically -->

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


        <h2> Change Home Image</h2>
        <form
            class="signup"
            id="form"
            action="{{ route('admin.img.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('POST')

            <label for="image"> Download image</label>
            <input
                id="image"
                name="image"
                type="file"
                title=" Download image"
                accept="image/*"
            >
            <div class="error">
                @error('image')
                    {{ $message }}
                @enderror
            </div>

            <button type="submit">Confirm</button>
        </form>


    </div>
@endsection
