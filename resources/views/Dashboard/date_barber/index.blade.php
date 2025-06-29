<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Dashboard - Barber Shop</title>
    <link
        type="image/x-icon"
        href="{{ asset('assets/images/jym post.svg') }}"
        rel="icon"
    >
    <link
        type="text/css"
        href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"
        rel="stylesheet"
    />

    <!-- jQuery CDN -->
</head>
<style>
    /* General styles */
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background-color: #f4f4f4;
    }


    .filter-section {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        justify-content: center;
        flex-wrap: wrap;
        /* Wrap items on smaller screens */
        border-radius: 8px;
    }

    .filter-item {
        display: flex;
        flex-direction: column;
        margin-top: 10px;
    }

    .filter-item label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    .filter-item input,
    .filter-item select {
        padding: 5px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    #filter-button,
    #delete-button,
    #add-button {
        align-self: flex-end;
        padding: 10px 20px;
        background-color: #000;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    a {
        padding: 0;
        margin: 0;
        font-size: 14px;
        text-decoration: none;

    }

    #filter-button:hover,
    #delete-button:hover,
    #add-button:hover {
        background-color: #333;
    }



    table {
        max-width: -moz-fit-content;
        max-width: fit-content;
        white-space: nowrap;
        min-width: 100%;
        border-collapse: collapse;
        font-size: 0.9em;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #000;
        color: white;
    }



    .daterangepicker .calendar-table {
        width: 100%;
    }

    .daterangepicker .drp-calendar.left {
        width: auto;
    }

    .daterangepicker table {
        table-layout: fixed;
        width: 100%;
    }

    .daterangepicker td {
        width: 14.28%;
    }




    /* Responsive Design */
    @media (max-width: 768px) {
        .filter-section {
            flex-direction: column;
            /* Stack filters vertically on smaller screens */
            align-items: center;
        }

        table {
            font-size: 0.8em;
            /* Further reduce font size on smaller screens */
        }
    }

    @media (max-width: 480px) {
        .filter-section {
            flex-direction: column;
            /* Stack filters vertically */
            align-items: center;
            /* Center the items */
            margin-bottom: 10px;
            /* Reduce margin below filters */
        }

        .filter-item {
            width: 100%;
            /* Make filter items full width */
            margin-top: 10px;
        }

        #filter-button,
        #delete-button,
        #add-button {
            width: 100%;
            /* Make filter button full width */
            margin-top: 10px;
        }

        .table-section {
            width: 100%;
            /* Make table section full width */
            overflow-x: auto;
            /* Ensure table can scroll horizontally if needed */
        }

        table {
            font-size: 0.1em;
            /* Further reduce font size */
            border: 0;
            overflow-x: auto;
            /* Remove table border */
        }

        th,
        td {
            border: 1px solid #ddd;
            /* Add border to table cells */
        }


    }

    .custom-alert {
        background-color: red;
        color: white;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
</style>

<body>

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


    <div class="filter-section">
        <div class="filter-item">
            <label for="date-range">Filter by Date Range:</label>
            <input
                id="date-range"
                type="text"
                placeholder="Select date range"
            >
        </div>
        <button id="filter-button">Filter</button>
        <button id="delete-button">Delete</button>
        <a
            id="add-button"
            href="{{ route('admin.date.barber.create') }}"
        >Add Date</a>


    </div>
    <table id="data-table">
        <thead>
            <tr>
                <th><input
                        id="select-all"
                        type="checkbox"
                    ></th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            <!-- Filtered results will be appended here -->
        </tbody>
    </table>

    <script
        type="text/javascript"
        src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script
        type="text/javascript"
        src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"
    ></script>
    <script
        type="text/javascript"
        src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"
    ></script>
    <script>
        $(function() {
            $('#date-range').daterangepicker({
                opens: 'center',
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Filter button click event
            $('#filter-button').on('click', function() {
                filterTable();
            });

            function filterTable() {
                var dateRange = $('#date-range').val();

                $.ajax({
                    url: '{{ route('filter_date_barber') }}',
                    type: 'POST',
                    data: {
                        dateRange: dateRange
                    },
                    success: function(response) {
                        var tbody = $('#data-table tbody');
                        tbody.empty(); // Clear existing data

                        response.forEach(function(item) {
                            var row = '<tr>' +
                                '<td><input type="checkbox" class="item-checkbox" data-id="' +
                                item.id + '"></td>' +
                                '<td>' + item.date + '</td>' +
                                '<td>' + item.time + '</td>' +
                                '</tr>'; // Close the row tag properly
                            tbody.append(row);
                        });
                    },
                    error: function(xhr, error) {
                        console.error("An error occurred: " + error);
                        console.log(xhr.responseText);
                    }
                });
            }
            $('#select-all').on('change', function() {
                var isChecked = $(this).is(':checked');
                $('.item-checkbox').prop('checked', isChecked);
            });

            $('#delete-button').on('click', function() {
                var selectedIds = [];

                $('.item-checkbox:checked').each(function() {
                    selectedIds.push($(this).data('id'));
                });

                if (selectedIds.length > 0) {
                    $.ajax({
                        url: '{{ route('date_barber_delete') }}', // Adjust the route name accordingly
                        type: 'DELETE', // Use DELETE method
                        data: {
                            ids: selectedIds
                        },
                        success: function(response) {
                            // Refresh the table or remove the deleted rows
                            filterTable(); // Call the filterTable to refresh the table
                        },
                        error: function(xhr, error) {
                            console.error("An error occurred: " + error);
                            console.log(xhr.responseText);
                        }
                    });
                } else {
                    alert("No items selected for deletion.");
                }
            });

        });
    </script>

</body>

</html>
