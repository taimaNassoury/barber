@extends('Dashboard.home')

@section('title', 'Show Schedual Date ') <!-- Set the page title dynamically -->

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

    <a
        class="add"
        href="{{ route('admin.date.create') }}"
    > Add Date</a>
    <table>
        <thead>
            <tr>
                <th> Day </th>
                <th>Time </th>
                <th>Operations </th>

            </tr>
        </thead>
        <tbody>

            @foreach ($schedual_date as $date)
                <tr>
                    <td>{{ $date->day }}</td>
                    <td>{{ $date->time }}</td>


                    <td>
                        <a
                            class="edit"
                            href="{{ route('admin.date.edit', $date->id) }}"
                        >Edit</a>
                        <!-- Delete Button -->
                        <a
                            class="delete"
                            href="javascript:void(0);"
                            onclick="showDeleteModal('{{ route('admin.date.delete', $date->id) }}')"
                        >
                            Delete
                        </a>


                    </td>

                </tr>


                <!-- Delete Confirmation Modal -->
                <!-- Delete Confirmation Modal -->
                <div
                    class="modal"
                    id="deleteModal"
                >
                    <div class="modal-content">
                        <span
                            class="close-btn"
                            onclick="closeModal()"
                        >&times;</span>
                        <h2>Confirm Deletion</h2>
                        <p>Are you sure you want to delete this date?</p>
                        <div class="modal-actions">
                            <button
                                class="cancel-btn"
                                onclick="closeModal()"
                            >Cancel</button>
                            <form
                                id="delete-form"
                                action=""
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    class="delete-btn"
                                    type="submit"
                                >Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
@endsection
<script>
    function showDeleteModal(actionUrl) {
        // Set the action attribute of the form to the delete route
        var form = document.getElementById('delete-form');
        form.action = actionUrl;

        // Show the modal
        document.getElementById('deleteModal').style.display = "block";
    }

    function closeModal() {
        // Hide the modal
        document.getElementById('deleteModal').style.display = "none";
    }

    // Close the modal if the user clicks anywhere outside of it
    window.onclick = function(event) {
        var modal = document.getElementById('deleteModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
