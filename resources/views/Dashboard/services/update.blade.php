@extends('Dashboard.home')

@section('title', ' Update Service') <!-- Set the page title dynamically -->

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


        <h2> Update Service</h2>
        <form
            class="signup"
            id="form"
            action="{{ route('admin.service.update', $services->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            <!-- Email Input -->
            <label for="email">Name </label>
            <input
                id="name"
                name="name"
                type="name"
                value="{{ $services->name }}"
            >
            <div class="error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>

            <!-- price Input -->
            <label for="password">Price </label>
            <input
                id="price"
                name="price"
                type="text"
                value="{{ $services->price }}"
            >

            <!-- Secondary Email Input -->
            <label for="min_price"> Min Price </label>
            <input
                id="min_price"
                name="min_price"
                value="{{ $services->min_price }}"
            >
            <div class="error">
                @error('min_price')
                    {{ $message }}
                @enderror
            </div>

            <!-- Max Price Input -->
            <label for="max_price"> Max Price</label>
            <input
                id="max_price"
                name="max_price"
                value="{{ $services->max_price }}"
            >
            <div class="error">
                @error('max_price')
                    {{ $message }}
                @enderror
            </div>

            <!-- Company Name Input -->
            <label for="currency"> Currency</label>
            <input
                id="currency"
                name="currency"
                value="{{ $services->currency }}"
            >


            <!-- Video Input -->
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
