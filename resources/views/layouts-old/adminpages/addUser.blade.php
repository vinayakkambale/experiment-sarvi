@extends('layouts.auth')
@section('content')
  <!-- SIGNUP MODAL START -->
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">

                        <div class="form-group my-2">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="fname" required>
                            <br>
                        </div>

                        <div class="form-group my-2">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" required>
                            <br>
                        </div>

                        <div class="form-group my-2">
                            <label for="phone">Phone Number:</label>
                            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" maxlength="10" required><br>
                        </div>

                        <div class="form-group my-2">
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" required><br>
                        </div>

                        


                        <div class="form-group my-2">
                            <label for="street">Address:</label>
                            <input type="text" id="address" name="address" required>
                            <br>
                        </div>

        

                        <!-- PAN Card Number Input -->
                        <div class="form-group my-2">
                            <label for="panNumber">PAN Card Number:</label>
                            <input type="text" id="panNumber" name="panNumber" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"
                                maxlength="10" required>
                        </div>

                        <!-- Aadhaar Card Number Input -->
                        <div class="form-group my-2">
                            <label for="aadharNumber">Aadhaar Card Number:</label>
                            <input type="text" id="aadharNumber" name="aadharNumber" pattern="\d{4}\s\d{4}\s\d{4}"
                                maxlength="14" placeholder="XXXX XXXX XXXX" required>
                        </div>

                        <!-- Gender Dropdown -->
                        
                        <button type="submit" class="btn btn-success my-3">Submit</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- SIGNUP MODAL END -->
    @endsection
