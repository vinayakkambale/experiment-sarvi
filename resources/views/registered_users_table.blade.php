@extends('layouts.auth')
@section('content')
  <div class="container-fluid">
      <!-- PAGE HEADING -->
      <div class="d-flex flex-col justify-content-between align-items-center">
          <h1 class="h3 mb-2 text-gray-800 fw-bold">Registered Users</h1>
          <!-- Redirect to the add user form -->
          <a href="{{ url('add-user') }}" class="btn btn-primary btn-sm rounded-pill">Add User</a>
      </div>

      <!-- DATATABLES -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 fw-bold text-primary">List of Registered Users</h6>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table datatable" id="dataTable" width="100%" cellspacing="0">
                      <!-- Starts - Table head -->
                      <thead>
                          <tr>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Date</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <!-- Ends - Table head -->
                      <tbody>
                          <!-- Starts - retrieving data from database -->
                          @if (!empty($users))
                              @foreach ($users as $user)
                                  <tr>
                                      <td>{{ $user['user_name'] }}</td>
                                      <td>{{ $user['email_id'] }}</td>
                                      <td>{{ date('d-m-Y', strtotime($user['created_at'])) }}</td>
                                      <!-- Starts - Redirect to view profile of user on button click -->
                                      <td class="d-flex justify-content-around">
                                          <a href="{{ url('view-profile/' . $user['id']) }}" class="btn btn-primary">
                                              View Profile
                                          </a>
                                      </td>
                                      <!-- Ends - Redirect to view profile of user on button click -->
                                  </tr>
                              @endforeach
                          @else
                              <!-- If user profile doesn't exist -->
                              <tr>
                                  <td colspan="4" class="text-center">No users found.</td>
                              </tr>
                          @endif
                          <!-- Ends - retrieving data from database -->
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
@endsection


 <script>
    // JavaScript to handle User profile data
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize DataTable
        const dataTable = new simpleDatatables.DataTable(".datatable");
        const editProfileLinks = document.querySelectorAll('.edit-profile');
        
        const profileData = @json($profiles);
        // console.log(profileData);
    
        editProfileLinks.forEach(link => {
            link.addEventListener('click', function() {
                const email = this.getAttribute('data-email');
                const modalId = `#profileModal${email}`;
    
                if (profileData[email]) {
                    const profile = profileData[email];
    
                    // Populating the form fields with profile data
                    document.querySelector(`#fullName`).value = profile.first_name + ' ' + profile.last_name;
                    document.querySelector(`#email`).value = profile.email_id;
                    document.querySelector(`#phone`).value = profile.phone_number;
                    document.querySelector(`#country`).value = profile.country_id;
                    document.querySelector(`#state`).value = profile.state_id;
                    document.querySelector(`#district`).value = profile.district_id;
                    document.querySelector(`#pinCode`).value = profile.pin_code;
    
                    const imgPreview = document.querySelector(`#imagePreview`);
                    imgPreview.src = profile.profile_image ? `{{ asset('uploads/') }}/${profile.profile_image}` : '';
                    imgPreview.style.display = profile.profile_image ? 'block' : 'none';
                }
            });
        });
    });
    </script>