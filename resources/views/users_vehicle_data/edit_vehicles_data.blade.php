@extends('layouts.auth')

@section('content')
<!-- MAIN CONTENT -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800">Edit Vehicle</h1>
        <a href="{{ route('users-vehicle-data.view', ['view' => 'view']) }}" class="btn btn-primary btn-sm rounded-pill text-center">View Users</a>
    </div>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Vehicle Details</h6>
        </div>
        <div class="card-body">
            <!-- Display success or error messages -->
            @if (session('status_message'))
                <div class="alert alert-success">{{ session('status_message') }}</div>
            @elseif ($errors->any())
                <div class="alert alert-danger">{{ $errors->first() }}</div>
            @endif

            <!-- FORM STARTS -->
            <form id="editForm" action="{{ route('edit-vehicles-data.edit', ['edit' => 'edit', 'id' => $edit_user_data->id]) }}" method="POST" class="d-flex flex-column gap-3">
                @csrf
                <input type="hidden" value="{{ $edit_user_data['id'] }}" name="id" />

                <div class="form-group">
                    <label for="new_user_id">User ID</label>
                    <input type="text" name="new_user_id" id="new_user_id" value="{{ $edit_user_data['user_id'] }}" placeholder="Enter User ID" class="form-control" required>
                    <small id="check-username"></small>
                    @error('new_user_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="vehicle_name">Vehicle Name</label>
                        <select class="form-select" name="vehicle_name" id="vehicle_name" class="form-control">
                            <option value="">Select Vehicle</option>
                            <option value="Two Wheeler" {{ $edit_user_data['vehicle_name'] == 'Two Wheeler' ? 'selected' : '' }}>Two Wheeler</option>
                            <option value="Four Wheeler" {{ $edit_user_data['vehicle_name'] == 'Four Wheeler' ? 'selected' : '' }}>Four Wheeler</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="vehicle_number">Vehicle Number</label>
                        <input type="text" name="vehicle_number" id="vehicle_number" value="{{ $edit_user_data['vehicle_number'] }}" placeholder="Enter Vehicle Number" class="form-control" required>
                    </div>
                </div>

                <div class="align-self-center mt-3">
                    <input type="submit" value="Save" class="btn btn-primary">
                    <a href="{{ route('users-vehicle-data.view', ['view' => 'view']) }}">
                        <button type="button" class="btn btn-primary ml-2">Back</button>
                    </a>
                </div>
            </form>
            <!-- FORM ENDS -->
        </div>
    </div>
</div>
@endsection

<!-- jQuery CDN to check User ID in Edit Vehicle Form -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- STARTS - VALIDATE USER ID EXISTENCE USING AJAX -->
<script>
    $(document).ready(function() {
        $("#new_user_id").focusout(function() {
            var new_user_id = $("#new_user_id").val();

            if (new_user_id) {
                checkNewUserId(new_user_id);
            }
        });

        function checkNewUserId(new_user_id) {
            $.ajax({
                type: "POST",
                url: "{{ url('check-user-id') }}", // Replace with your Laravel route
                data: {
                    'new_user_id': new_user_id,
                    '_token': '{{ csrf_token() }}' // Include CSRF token
                },
                dataType: "json",
                success: function(response) {
                    if (response.exists) {
                        $("#check-username").text(response.user_name).addClass('text-success');
                    } else {
                        $("#check-username").text('User ID not found').addClass('text-danger');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    $("#check-username").text("An error occurred: " + xhr.responseText);
                }
            });
        }
    });
</script>
<!-- ENDS - VALIDATE USER ID EXISTENCE USING AJAX -->

<!-- STARTS - Handle form submission status message -->
<script>
    setTimeout(() => {
        let statusMessage = document.getElementById('status-message');
        if (statusMessage) {
            statusMessage.style.display = 'none';
        }
    }, 5000);
</script>
<!-- ENDS - Handle form submission status message -->
