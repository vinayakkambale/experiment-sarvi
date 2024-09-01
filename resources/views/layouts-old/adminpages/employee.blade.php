
@extends('layouts.auth')
@section('content')




    <div class="pagetitle">
      <h1 style="padding:20px">Employees Table   <a class="btn btn-sm btn-success" href="adduser">Add New User</a></h1>
      
    </table>
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
    
          <div class="card">
            <div class="card-body">
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                  <th scope="col">id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aadhar Card No.</th>
                        <th scope="col">Pan Card No.</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
    
                  </tr>
                </thead>
                <tbody>
                    
                        <tr>
                            <td>1</td>
                            <td>Utkarsh</td>
                            <td>Kapoor</td>
                            <td>1234567899</td>
                            <td>u@gmail.com</td>
                            <td>1111 2222 3333</td>
                            <td>ABCDE2223I</td>
                            <td>Palava, Dombivali East</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                       
                </tbody>
    
              </table>
              <!-- End Table with stripped rows -->
    
            </div>
          </div>
    
        </div>
      </div>
    </section>
    

@endsection