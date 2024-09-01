@extends('layouts.auth')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex flex-col justify-content-between align-items-center">
        <h1 class="h3 mb-2 text-gray-800 fw-bold">Users Vehicle Data</h1>
        <a href="{{ route('add-new-vehicle.add', ['add' => 'add']) }}" class="btn btn-primary btn-sm rounded-pill">Add Vehicle</a>
    </div>

    <!-- DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary fw-bold">List of all Users Vehicle Data</h6>
        </div>
        <div class="card-body">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Vehicle</th>
                        <th>Vehicle Number</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- Starts retrieving data from database -->
                    @foreach ($user_vehicle_data as $userdata)
                        <tr>
                            <td>{{ $userdata->user_name }}</td>
                            <td>{{ $userdata->vehicle_name == 'Select Vehicle' ? 'N/A' : $userdata->vehicle_name }}</td>
                            <td>{{ $userdata->vehicle_number }}</td>
                            <!-- Starts sending id parameter for edit and delete -->
                            <td class="d-flex justify-content-around">
                                <a href="{{ route('edit-vehicles-data.edit', ['edit' => 'edit', 'id' => $userdata->id]) }}">
                                    <i class='fas fa-pencil-alt'></i>
                                </a>
                                <a href="{{ route('users-vehicle-data.delete', ['delete' => 'delete', 'id' => $userdata->id]) }}" class="delete-member" data-id="{{ $userdata->id }}">
                                    <i class='fas fa-trash'></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <!-- Ends retrieving data from database -->
                </tbody>
                
            </table>
        </div>
    </div>
</div>
@endsection

{{-- SCRIPTS START --}}
<!-- SweetAlert2 for alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Initialization Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize DataTable
        const dataTable = new simpleDatatables.DataTable(".datatable");
    
        // Select all delete member links
        const deleteLinks = document.querySelectorAll('.delete-member');
    
        // Attach click event handler to each delete link
        deleteLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                let memberId = this.getAttribute('data-id');
                let deleteUrl = "{{ route('users-vehicle-data.delete', ['delete' => 'delete', 'id' => '__ID__']) }}".replace('__ID__', memberId);

                // Handle Sweet Alert Library
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4E73DF',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, redirect to delete URL
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'User deleted Successfully!',
                            icon: 'success'
                        }).then(() => {
                            window.location.href = deleteUrl;
                        });
                    }
                });
            });
        });
    });
</script>
{{-- SCRIPTS END --}}