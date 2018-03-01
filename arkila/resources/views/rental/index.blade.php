@extends('layouts.master')
@section('title', 'Rental List')
@section('content-header', 'Rental List')
@section('links')
@parent
   
@stop


@section('content')
        <section class="content">
                <div class="box">

                    <div class="box-body">
                        <div class="col-xl-6">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Online Rental</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">List of Rentals</a></li>

                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <b>Details:</b>
                                        <table id="example2" class="table table-bordered table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Destination</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Contact Number </th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rentals->sortByDesc('status')->where('rent_type', 'Online') as $rental)
                                                <tr>
                                                <td>{{ $rental->full_name }}</td>
                                                <td>{{ $rental->destination }}</td>
                                                <td>{{ $rental->departure_date }}</td>
                                                <td>{{ $rental->departure_time }}</td>
                                                <td>{{ $rental->contact_number }}</td>
                                                <td>{{ $rental->status }}</td>    
                                                <td class="center-block">
                                                <div class="text-center">
                                                <form action="{{ route('rental.update', $rental->rent_id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                          
                                                  @if ($rental->status == 'Pending')
                                                      <button class="btn btn-success" name="click" onclick="return ConfirmStatus()" value="Paid"><i class="fa fa-automobile"></i> Paid</button>
                                                      <button class="btn btn-danger" name="click" onclick="return ConfirmStatus()" value="Declined"><i class="fa fa-close"></i> Decline</button>
                                                  @elseif ($rental->status == 'Paid')
                                                      <button class="btn btn-success" name="click" onclick="return ConfirmStatus()" value="Departed"><i class="fa fa-automobile"></i> Depart</button>
                                                      <button class="btn btn-danger" name="click" onclick="return ConfirmStatus()" value="Cancelled"><i class="fa fa-close"></i> Cancel</button>
                                                  @else
                                                      <form method="POST" action="/home/rental/{{ $rental->rent_id }}" class="delete">
                                                           {{csrf_field()}}
                                                           {{method_field('DELETE')}}
                                                        <button class="btn btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Delete</i></button>
                                                      </form>                          
                                                  @endif
                                                 </form>
                                              </td>
                                             </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <div class="form-group">
                                            <a href="/home/rental/create" class = "btn btn-outline-danger">Add Walk-in Reservation</a>
                                        </div>
                                        <table id="example3" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Destination</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Contact Number</th>
                                                    <th>Status</th> 
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($rentals->sortByDesc('status') as $rental)

                                            @if ($rental->status == 'Paid' | $rental->status == 'Cancelled' | $rental->status == 'Departed')
                                            <tr>
                                            <td>{{ $rental->full_name }}</td>
                                            <td>{{ $rental->destination }}</td>
                                            <td>{{ $rental->departure_date }}</td>
                                            <td>{{ $rental->departure_time }}</td>
                                            <td>{{ $rental->contact_number }}</td>
                                            <td>{{ $rental->status }}</td>    
                                            <td class="center-block">
                                            <div class="center-block">
                                    <form action="{{ route('rental.update', $rental->rent_id) }}" method="POST" class="form-action">
                                                        {{ csrf_field() }}
                                                        {{ method_field('PATCH') }}

                                            @if ($rental->status == 'Paid')
                                                        <button class="btn btn-success" name="click" id="depart" onclick="return ConfirmStatus()" value="Departed"><i class="fa fa-automobile"></i> Depart </button>
                                                        <button class="btn btn-danger" name="click" id="depart" onclick="return ConfirmStatus()" value="Cancelled"><i class="fa fa-close"></i> Cancel </button>
                                                    </form>
                                            @else
                                                  <form method="POST" action="/home/rental/{{ $rental->rent_id }}" class="delete">
                                                       {{csrf_field()}}
                                                       {{method_field('DELETE')}}
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Delete</i></button>
                                                  </form>
                                            @endif
                                                  </div>
                                              </td>                        
                                            </tr>
                                            @endif
                                            </tbody>
                                            @endforeach
                                        </table>
                                    
                                    <!-- /.box-body -->
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div>
            </section>

                            
@endsection
@section('scripts')
@parent          
  <script>

$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#example3').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
    
     var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the crurrent tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
     }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields


            return true; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace("active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }

        function getData() {
            var firstName = document.getElementById('firstName').value;
            var lastName = document.getElementById('lastName').value;
            var middleName = document.getElementById('middleName').value;

            if(firstName !== '' && lastName !== '' && middleName !== '') {
                document.getElementById('nameView').textContent = lastName + ', ' + firstName + ' ' + middleName;
            }

            var contactNumber = document.getElementById('contactNumber').value;
            document.getElementById('contactView').textContent = contactNumber;

            var destination = document.getElementById('destination').value;
            document.getElementById('destView').textContent = destination;

            var vanType = document.getElementById('model').value;
            document.getElementById('vanView').textContent = vanType;

            var days = document.getElementById('days').value;
            document.getElementById('daysView').textContent = days;

            var date = document.getElementById('datepicker').value;
            document.getElementById('dateView').textContent = date;

            var time = document.getElementById('timepicker').value;
            document.getElementById('timeView').textContent = time;
        }

        function ConfirmDelete()
        {
            var x = confirm("Delete this request?");
            if (x)
            return true;
            else
            return false;
        }

        function ConfirmSubmit()
        {
            var x = confirm("You are about to submit this reservation request, this action can not be undone. Do you want to continue?");
            if (x)
            return true;
            else
            return false;
        }
        function ConfirmStatus()
        {
            var x = confirm("Change status?");

            if (x)
            return true;
            else
            return false;

        }

    
    </script>
@endsection