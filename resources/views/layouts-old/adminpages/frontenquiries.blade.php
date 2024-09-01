
@extends('layouts.auth')

@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
              @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
            <div class="card-body">


              <h5 class="card-title">Submitted Enquiries</h5>
              {{-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable. Check for <a href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more examples</a>.</p> --}}

              <!-- Table with stripped rows -->
              <table class="table datatable">
                  <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enquiries as $enquiry)
                <tr>
                    <td>{{ $enquiry->name }}</td>
                    <td>{{ $enquiry->email }}</td>
                    <td>{{ $enquiry->subject }}</td>
                    <td>{{ $enquiry->message }}</td>
                </tr>
                @endforeach
            </tbody>
               
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>


    @endsection


  