@extends('Dashboard.home')

@section('title', ' Change Home Image') <!-- Set the page title dynamically -->

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
        class="button-img"
        href="{{ route('admin.img.create') }}"
    >Add Image</a>

    @foreach ($home_imgs->chunk(3) as $chunk)
        <div class="columns">
            @foreach ($chunk as $home_img)
                <div class="column">
                    <img
                        src="{{ asset($home_img->image) }}"
                        alt="home_img Image"
                    >
                    <a
                        class="button"
                        href="{{ route('admin.img.update', $home_img->id) }}"
                    >Select</a>
                    <a
                        class="button-delete"
                        href="javascript:void(0);"
                        onclick="showDeleteModal('{{ route('admin.img.delete', $home_img->id) }}')"
                    >
                        Delete
                    </a>


                </div>
            @endforeach
        </div>
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
                        action="{{ route('admin.img.delete', $home_img->id) }}"
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
    <!-- Delete Confirmation Modal -->

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
