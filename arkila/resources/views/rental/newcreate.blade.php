@extends('layouts.master')
@section('links')
@parent

@endsection
@section('title', 'Rentals')
@section('content')
        <section class="content">
                <div class="box">

                    <div class="box-body">
                        <div class="col-xl-6">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Online Rental</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">List of Rentals</a></li>

                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <b>Details:</b>
                                        <table class="table table-bordered table-striped example1">
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
                                                <tr>
                                                    <td>Chabal loves shaina</td>
                                                    <td>Bakakeng</td>
                                                    <td>10:00 pm</td>
                                                    <td>14</td>
                                                    <td>14</td>
                                                    <td>14</td>
                                                    <td class="center-block">
                                                        <div class="center-block">
                                                            <button class="btn btn-outline-success"><i class="fa fa-check"></i> Paid</button>
                                                            <button class="btn btn-outline-danger"><i class="fa fa-close"></i> Decline</i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Chabal loves shaina</td>
                                                    <td>0998273</td>
                                                    <td>badihoy</td>
                                                    <td>15</td>
                                                    <td>14</td>
                                                    <td>14</td>
                                                     <td class="center-block">
                                                        <div class="center-block">
                                                            <button class="btn btn-outline-success"><i class="fa fa-check"></i> Paid</button>
                                                            <button class="btn btn-outline-danger"><i class="fa fa-close"></i> Decline</i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">

                                       
                                        <div class="form-group">
                                             <label>Destination</label>
                                            <select class="form-control select2 select2-hidden-accessible" style="width: 50%;" tabindex="-1" aria-hidden="true">
                                              <option selected="selected">Alabama</option>
                                              <option>Alaska</option>
                                              <option>California</option>
                                              <option>Delaware</option>
                                              <option>Tennessee</option>
                                              <option>Texas</option>
                                              <option>Washington</option>
                                            </select>


                                        </div>

                                        <div class="form-group fixMarginRight ">
                                            <label>Departure Date:</label>

                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="datepicker">
                                            </div>

                                            <!-- time Picker -->
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                    <label>Time picker:</label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control timepicker">

                                                        <div class="input-group-addon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </div>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->
                                            </div>

                                            <label>Number of Seats</label>
                                            <div class="form-group">
                                                <input type="number" class="form-control" max=15 min=1>
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div>
                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Submit</button>

                                            <!-- Modal -->
                                            <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Walk-in Reservation Information</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Origin: Baguio City</p>
                                                            <p> Destination: Cabanatuan </p>
                                                            <p>Preferred date: 01/17/17</p>
                                                            <p>Departure time: 2:30 PM</p>
                                                            <p> Total Passengers :2 </p>

                                                            <p>Fare Amount: PHP 350.00</p>
                                                            <p>Total Passenger : 2 </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="tab-pane" id="tab_3">
                                        <div class="form-group">
                                            <a href="create.blade.php" class = "btn btn-outline-danger">Add Walk-in Reservation</a>
                                        </div>
                                        <table class="table table-bordered table-striped example1">
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
                                                <tr>
                                                    <td>Randall</td>
                                                    <td>Marcos Highway</td>
                                                    <td>9:00 pm</td>
                                                    <td>15</td>
                                                    <td>15</td>
                                                    <td>65656566565</td>
                                                    <td class="center-block">
                                                        <div class="center-block">
                                                            <button class="btn btn-danger"><i class="fa fa-check"></i> Cancel</button>
                                                            <button class="btn btn-danger"><i class="fa fa-check"></i> Delete</button>
                                                            </button>

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Randall;</td>
                                                    <td>Marcos hHighway</td>
                                                    <td>9:10 pm</td>
                                                    <td>05</td>
                                                    <td>15</td>
                                                    <td>656566565</td>
                                                    <td class="center-block">
                                                        <div class="center-block">
                                                            <button class="btn btn-danger"><i class="fa fa-check"></i> Cancel</button>
                                                            <button class="btn btn-danger"><i class="fa fa-close"></i> Delete</button>


                                                        </div>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>

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
    
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

  })
    $(function () {
    
    //Date picker
    $('#timepicker').timepicker({
      showInputs:false
    })

  })
    </script>
    
    
    
    <script>
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
        
    </script>
@endsection