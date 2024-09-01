<!-- MAIN STARTS -->
@extends('layouts.auth')
@section('content')
{{-- <main id="main" class="main"> --}}
    <div class="container-fluid">
        <!-- STARTS - PAGE HEADING -->
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-2 text-gray-800 fw-bold">Add User</h1>
            <a href="{{ route('registered-users') }}" class="btn btn-primary btn-sm rounded-pill text-center">View Users</a>
        </div>
    
        <!-- STARTS - ADD USER FORM -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary fw-bold">Add New User</h6>
            </div>
            <div class="card-body">
                @if(isset($status_message))
                    <div class="alert alert-info" id="status-message">{{ $status_message }}</div>
                @endif
    
                <!-- form starts -->
                <form id="addUserForm" action="{{ route('add-user') }}" method="POST" class="d-flex flex-column gap-3" novalidate>
                    @csrf
                    <div class="row mt-2">
                        <div class="form-group col-md-6">
                            <label for="user_name">Username</label>
                            <input type="text" name="user_name" id="user_name" value="{{ old('user_name') }}" placeholder="Enter Username" class="form-control" required>
                            @error('user_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email_id">Email</label>
                            <input type="email" name="email_id" id="email_id" value="{{ old('email_id') }}" placeholder="example@gmail.com" class="form-control" required>
                            @error('email_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
    
                    <div class="align-self-center mt-3">
                        <input type="submit" value="Save" class="btn btn-primary">
                        <a href="{{ route('registered-users') }}">
                            <button type="button" class="btn btn-primary ml-2">Back</button>
                        </a>
                    </div>
                </form>
                <!-- form ends -->
            </div>
        </div>
        <!-- ENDS - ADD USER FORM -->
    </div>
    @endsection
    
{{-- </main> --}}

<!-- MAIN ENDS -->

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- STARTS - HANDLE STATUS MESSAGE -->
<script>
  setTimeout(() => {
      const statusMessage = document.getElementById('status-message');
      if(statusMessage) {
          statusMessage.style.display = 'none';
      }
  }, 5000)
  </script>
<!-- ENDS - HANDLE STATUS MESSAGE -->