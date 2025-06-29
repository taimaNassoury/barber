@extends('Dashboard.home')

@section('title', 'Show Services ') <!-- Set the page title dynamically -->

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

    @if (session('warning'))
        <div
            class="notification warning"
            id="warning"
        >
            {{ session('warning') }}
        </div>
    @endif

    <a
        class="add"
        href="{{ route('admin.service.create') }}"
    > Add Service</a>
    <table>
        <thead>
            <tr>
                <th> Name </th>
                <th>Price </th>
                <th> Min Price</th>
                <th> Max Price </th>
                <th>Currency </th>
                <th> Image </th>
                <th> Operations </th>


                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>

            @foreach ($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->price }}</td>
                    <td>{{ $service->min_price }}</td>
                    <td>{{ $service->max_price }}</td>
                    <td>{{ $service->currency }}</td>
                    <td>{{ $service->image }}</td>
                    <td>
                        <a
                            class="edit"
                            href="{{ route('admin.service.edit', $service->id) }}"
                        >Edit</a>
                        <!-- Delete Button -->
                        <a
                            class="delete"
                            href="javascript:void(0);"
                            onclick="showDeleteModal('{{ route('admin.service.delete', $service->id) }}')"
                        >
                            Delete
                        </a>


                    </td>

                </tr>


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
                        <p>Are you sure you want to delete this service?</p>
                        <div class="modal-actions">
                            <button
                                class="cancel-btn"
                                onclick="closeModal()"
                            >Cancel</button>
                            <form
                                id="delete-form"
                                action="{{ route('admin.service.delete', $service->id) }}"
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
