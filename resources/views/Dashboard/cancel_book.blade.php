@extends('Dashboard.home')

@section('title', 'Show Dates Barber ') <!-- Set the page title dynamically -->
<!-- Scripts -->
@vite(['resources/js/app.js'])

<!-- Styles -->
@vite(['resources/css/app.css'])
@livewireStyles
@section('content')

    @livewire('book-cancel')

@endsection
@livewireScripts()
