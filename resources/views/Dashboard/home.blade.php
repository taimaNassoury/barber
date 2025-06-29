<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Control Panel </title>
    <link
        href="styles.css"
        rel="stylesheet"
    > <!-- Link to your CSS file -->
</head>
<style>
    /* General styles */
    body {
        margin: 0;
        direction: ltr;
    }

    label {
        font-family: sans-serif;
    }

    .dashboard {
        display: flex;
        height: 100vh;
    }

    /* Sidebar styles */
    .sidebar {
        width: 250px;
        background-color: #000;
        color: white;
        padding: 20px;
        display: flex;
        flex-direction: column;
    }

    .sidebar h2 {
        margin-bottom: 20px;
    }



    .menu {
        list-style: none;
        padding: 0;
    }

    .menu-item,
    .logout button {
        display: block;
        padding: 10px 15px;
        color: white;
        text-decoration: none;
        margin-bottom: 10px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }



    .menu-item:hover,
    .logout button:hover {
        background-color: #555;
    }

    /* Content styles */
    .content {
        flex-grow: 1;
        padding: 20px;
    }

    .header {
        background-color: #f4f4f4;
        padding: 15px;
        border-bottom: 1px solid #ddd;
    }

    .main-content {
        padding: 20px;
        background-color: #fff;
        margin-top: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
        display: block;
        height: 100%;
        background-color: #fff;
        padding: 20px;
    }

    /* Form Container Styles */
    .form-container {
        margin-top: 20px;
        padding: 20px;
        border-radius: 8px;
        height: 100vh;
        box-sizing: border-box;
        /* Ensure padding is included in height */
    }


    /* Title Styles */
    .form-container h2 {
        margin-bottom: 15px;
    }

    /* Input Styles */
    .form-container input {
        width: calc(100% - 20px);
        /* Adjust for padding */
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    /* Button Styles */
    .form-container button {
        padding: 10px 15px;
        background-color: #000;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 5px;
        /* Add spacing above buttons */
    }

    /* Button Hover Styles */
    .form-container button:hover {
        background-color: #555;
    }

    /* Remove Button Styles */
    .remove-button {
        background-color: #ff4d4d;
        /* Red color for removal button */
        margin-top: 0;
        /* Remove extra margin for remove button */
        margin-left: 10px;
        /* Add space between input and button */
    }

    .remove-button:hover {
        background-color: #cc0000;
        /* Darker red on hover */
    }

    .form {
        margin-top: -230px;

    }

    .form-record {
        width: 100px;
        height: 0;
    }

    .term-container {
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        direction: ltr;
        text-align: left;
        margin-top: 30px;


    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 16px;
        direction: ltr;
        text-align: left;
    }

    th {
        background-color: #000;
        color: #fff;
    }

    .logout {
        height: 0;
        background-color: #000;
        padding: 0 15px;

    }

    .logout button {
        background-color: #000;
        border: none;
        color: #fff;
        font-size: 14px;
        cursor: pointer;
    }


    .columns {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 20px;
    }

    .column {
        width: 300px;
        max-width: 30%;
        height: 300px;
        margin-bottom: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        /* Smooth hover effect */
    }

    .column:hover {
        transform: scale(1.05);
        /* Slightly enlarge on hover */
    }

    .column img {
        width: 100%;
        height: 250px;
    }

    a {
        text-decoration: none;
    }

    #end_date,
    #start_date {
        padding: 10px 20px;
        border-radius: 15px;
    }

    #add_date {
        align-self: flex-end;
        padding: 10px 20px;
        background-color: #000;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    #add_date:hover {
        background-color: #333;
    }

    .add {
        background-color: #28a745;
        color: #fff;
        padding: 10px 20px;
        border-radius: 15px;
    }

    .delete {
        background-color: #e74c3c;
        color: #fff;
        padding: 7px;


    }

    .edit {
        background-color: #ddbd0a;
        color: #fff;
        padding: 7px;


    }


    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #4CAF50;
        /* Green for success */
        color: white;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        font-family: Arial, sans-serif;
        z-index: 1000;
        opacity: 0;
        transition: opacity 0.5s ease, transform 0.5s ease;
        transform: translateY(-20px);
    }

    .notification.success {
        background-color: #28a745;
        /* Success color */
    }

    .notification.delete,
    .notification.error {
        background-color: red;
        /* Success color */
    }

    .notification.warning {
        background-color: #ddbd0a;
        /* Success color */
    }

    .notification.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Modal container */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
    }

    /* Modal content */
    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 300px;
        height: 200px;
        border-radius: 8px;
        text-align: center;
        position: relative;
    }

    /* Close button */
    .close-btn {
        color: #aaa;
        position: absolute;
        right: 10px;
        top: 10px;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    /* Modal actions */
    .modal-actions {
        display: flex;
        justify-content: center;
        margin-top: 30px;
        /* Add some space above the buttons */
    }

    /* Buttons */
    .cancel-btn,
    .delete-btn {
        padding: 10px 20px;
        margin: 0 10px;
        /* Space between the buttons */
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100px;
        text-align: center;
    }

    .cancel-btn {
        background-color: #ccc;
    }

    .delete-btn {
        background-color: #e74c3c;
        color: #fff;
    }

    .button:hover,
    .button-img {
        background-color: #ccc;
        color: #000;
    }

    .button,
    .button-img,
    .button-delete {
        display: inline-block;
        font-weight: bold;
        background-color: #000;
        color: #fff;
        font-size: 1rem;
        margin: 10px;
        padding: 10px 20px;
        transition: background-color 0.2s;
        /* Smooth color transition */
    }

    .button-delete {
        background-color: #e74c3c;

    }

    .button {
        margin-left: 60px;
    }
</style>

<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2> Control Panel</h2>


            <a
                class="menu-item"
                href="{{ route('schedule') }}"
            >Booking Schedule</a>
            <a
                class="menu-item"
                href="{{ route('cancel_book') }}"
            >Cancelled Bookings</a>
            <a
                class="menu-item"
                href="{{ route('index') }}"
            >Show Services</a>

            <a
                class="menu-item"
                href="{{ route('admin.img.index') }}"
            >Change Home Image</a>

            <a
                class="menu-item"
                href="{{ route('admin.date.index') }}"
            >Change Home Schedual Date</a>

            <a
                class="menu-item"
                href="{{ route('admin.date.barber.index') }}"
            >Add years</a>
            <form
                class="logout"
                method="POST"
                action="{{ route('admin.logout') }}"
            >
                @csrf
                <button type="submit">Log OUT</button>
            </form>





        </aside>

        <!-- Main Content -->
        <main class="content">
            <header class="header">
                <h1></h1>
                <!-- Add search or profile icon here -->
            </header>

            <section class="main-content">
                @yield('content') <!-- Dynamic content section -->
            </section>
        </main>
    </div>


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
</body>

</html>
