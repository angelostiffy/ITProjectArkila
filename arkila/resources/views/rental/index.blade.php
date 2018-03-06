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
                            <table class="table table-bordered table-striped rentalTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Destination</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Contact Number </th>
                                        <th>Van Model </th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rentals->sortByDesc('status')->where('rent_type', 'Online') as $rental) @if ($rental->status == 'Pending' | $rental->status == 'Paid')
                                    <tr>
                                        <td>{{ $rental->rent_id }}</td>
                                        <td>{{ $rental->full_name }}</td>
                                        <td>{{ $rental->destination }}</td>
                                        <td>{{ $rental->departure_date }}</td>
                                        <td>{{ $rental->departure_time }}</td>
                                        <td>{{ $rental->contact_number }}</td>
                                        <td>{{ $rental->van->model }}</td>
                                        <td>{{ $rental->status }}</td>
                                        <td class="center-block">
                                            <div class="text-center">
                                                <form action="{{ route('rental.update', $rental->rent_id) }}" method="POST">
                                                {{ csrf_field() }} {{ method_field('PATCH') }} 

                                                @if ($rental->status == 'Pending')
                                                    <button class="btn btn-success" name="click" onclick="return ConfirmStatus()" value="Paid"><i class="fa fa-automobile"></i> Paid</button>
                                                    <button class="btn btn-outline-danger" name="click" onclick="return ConfirmStatus()" value="Declined"><i class="fa fa-close"></i> Decline</button>
                                                </form>
                                                
                                                @elseif ($rental->status == 'Paid')
                                                    <button class="btn btn-primary" name="click" onclick="return ConfirmStatus()" value="Departed"><i class="fa fa-automobile"></i> Depart</button>
                                                    <button class="btn btn-outline-danger" name="click" onclick="return ConfirmStatus()" value="Cancelled"><i class="fa fa-close"></i> Cancel</button> @else
                                                    <form method="POST" action="/home/rental/{{ $rental->rent_id }}" class="delete">
                                                        {{csrf_field()}} {{method_field('DELETE')}}
                                                        <button class="btn btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Delete</i></button>
                                                    </form>
                                                @endif 
                                            @endif
                                                
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>

                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <div class="col col-md-6">
                                    <a href="/home/rental/create" class="btn btn-primary">Add Rental</a>
                                </div>
                                <table id="listRent" class="table table-bordered table-striped rentalTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Destination</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Contact Number</th>
                                            <th>Van Model</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rentals->sortByDesc('status') as $rental) 
                                        
                                            @if ($rental->status == 'Paid' | $rental->status == 'Cancelled' | $rental->status == 'Departed')
                                            <tr>
                                                <td>{{ $rental->rent_id }}</td>
                                                <td>{{ $rental->full_name }}</td>
                                                <td>{{ $rental->destination }}</td>
                                                <td>{{ $rental->departure_date }}</td>
                                                <td>{{ $rental->departure_time }}</td>
                                                <td>{{ $rental->contact_number }}</td>
                                                <td>{{ $rental->van->model }}</td>
                                                <td>{{ $rental->status }}</td>
                                                <td class="center-block">
                                                    <div class="center-block">
                                                        <form action="{{ route('rental.update', $rental->rent_id) }}" method="POST" class="form-action">
                                                            {{ csrf_field() }} {{ method_field('PATCH') }}

                                                        @if ($rental->status == 'Paid')
                                                            <button class="btn btn-primary" name="click" id="depart" onclick="return ConfirmStatus()" value="Departed"><i class="fa fa-automobile"></i> Depart </button>
                                                            <button class="btn btn-outline-danger" name="click" id="depart" onclick="return ConfirmStatus()" value="Cancelled"><i class="fa fa-close"></i> Cancel </button>
                                                        </form>
                                                        @else
                                                        <form method="POST" action="/home/rental/{{ $rental->rent_id }}" class="delete">
                                                            {{csrf_field()}} {{method_field('DELETE')}}
                                                            <button class="btn btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-trash"></i> Delete</i></button>
                                                        </form>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                        
                                     @endforeach
                                    </tbody>
                                   
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
    
    $('.rentalTable').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'order'       : [[ 1, "desc" ]] 
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

        function ConfirmDelete()
        {
            var x = confirm("Delete this request?");
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