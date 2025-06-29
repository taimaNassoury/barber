@extends('Dashboard.home')

@section('title', 'Show Dates Barber ') <!-- Set the page title dynamically -->

@section('content')
    <!-- Display Success Message -->
    @if (session('success'))
        <div
            class="notification success"
            id="success"
        >
            {{ session('success') }}
        </div>
    @endif

    @if (session('warning'))
        <div
            class="notification warning"
            id="warning"
        >
            {{ session('warning') }}
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

    <!-- Display Delete Message -->
    @if (session('delete'))
        <div
            class="notification delete"
            id="delete"
        >
            {{ session('delete') }}
        </div>
    @endif

    <form
        action="{{ route('admin.date.barber.store') }}"
        method="POST"
    >
        @csrf
        <label for="start_date">Start Date:</label>
        <input
            id="start_date"
            name="start_date"
            type="date"
            required
        >

        <label for="end_date">End Date:</label>
        <input
            id="end_date"
            name="end_date"
            type="date"
            required
        >

        <button
            id="add_date"
            type="submit"
        >confirm</button>
    </form>


@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const success = document.getElementById('success');
        const error = document.getElementById('error');
        const deleteNotification = document.getElementById('delete'); // Renamed variable
        const warning = document.getElementById('warning');


        // Function to handle showing and hiding notifications
        function handleNotification(notificationElement) {
            if (notificationElement) {
                notificationElement.classList.add('show');

                // Auto-hide the notification after 3 seconds
                setTimeout(function() {
                    notificationElement.classList.remove('show');
                }, 3000);
            }
        }

        // Apply the function to each notification type
        handleNotification(success);
        handleNotification(warning);
        handleNotification(error);
        handleNotification(deleteNotification);
    });
</script>
