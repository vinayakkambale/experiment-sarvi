
@extends('layouts.auth')
@section('content')

<main>

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card">

                <div class="card-body">

                  <div class="pt-4 pb-1">
                    <h5 class="card-title text-center pb-0 fs-4">Add New User</h5>
                    <p class="text-center small">Always get ready to march ahead</p>
                  </div>

                  <form action="signup" method='post' class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label" >First Name</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="fname" class="form-control" id="fname" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label" >Last Name</label>
                      <div class="input-group has-validation">
                        <input type="text" name="lname" class="form-control" id="lname" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>


                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please enter your email!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourPhone" class="form-label">Phone</label>
                      <input type="tel" id="yourPhone" class="form-control" name="phone" pattern="[0-9]{10}" maxlength="10" required>
                      <div class="invalid-feedback">Please enter your phone number!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourAddress" class="form-label">Permenant Address</label>
                      <input type="text" name="address" class="form-control" id="yourAddress" required>
                      <div class="invalid-feedback">Please enter your permenant address!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourAadhar" class="form-label">Aadhar Card</label>
                      <input type="text" id="aadharNumber" class="form-control" name="aadharNumber" pattern="\d{4}\s\d{4}\s\d{4}"
                                maxlength="14" placeholder="XXXX XXXX XXXX" required>
                      <div class="invalid-feedback">Please enter your phone number!</div>
                    </div>


                    <div class="col-12">
                      <label for="yourAadhar" class="form-label">Pan Card</label>
                      <input type="text" id="panNumber" class="form-control" name="panNumber" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"
                                maxlength="10" required>
                      <div class="invalid-feedback">Please enter your phone number!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-success w-100" type="submit">Add</button>
                    </div>
                   
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

  
  </main><!-- End #main -->

  @endsection
