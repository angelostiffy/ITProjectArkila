@extends('layouts.form_lg')
@section('links')
@parent
@endsection
@section('title', 'Walk-In')
@section('form-id', 'Walk-in Reservation')
@section('form-action', route('rental.index'))
@section('form-method', 'POST')
@section('form-body')

                     
<div class="box box-warning">
        <div class="box-header with-border text-center">
            <a href="{{ URL::previous() }}" class="pull-left btn btn-default"><i class="fa  fa-chevron-left"></i></a>
            <h3 class="box-title">
                Walk-In Reservation
            </h3>
        </div>
        <div class="box-body">

                <!-- One "tab" for each step in the form: -->
                <div class="tab">
                    <h4>Trip Information</h4>
                    <div class="row">
                         <div class="col-md-4">
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" placeholder="Full Name" name="firstName" id="firstName" value="{{ old('firstName') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Destination</label>
                                <select name="dest" class="form-control" id="dest">
                                    <option>Laos</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Departure Date:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="date" id="date" class="form-control pull-right" value="">
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                             <div class="form-group">
                                <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label>Time picker:</label>
                                            <div class="input-group">
                                                <input type="text" name="time" id="time" class="form-control timepicker" value="">

                                                 <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                 </div>
                                            </div>
                                                    <!-- /.input group -->
                                    </div>
                                                <!-- /.form group -->
                                </div>
                             </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label>Number of Seats:</label>
                                <input type="number" class="form-control" placeholder="Number of Seats" name="destination" max="15" min="1" id="destination" value="{{ old('destination') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" placeholder="Contact Number" name="destination" id="destination" value="{{ old('destination') }}">

                            </div>
                        </div>
                    </div>
           </div>
    
            <div class="tab">
                    <h4>Summary</h4>
                    <div class = "row">
                           <dl class = "dl-horizontal">
                           <dt>Name:</dt>
                            <dd id="nameView"></dd>
                            <dt>Contact Number:</dt>
                            <dd id="contactView"></dd>
                            <dt>Destination:</dt>
                            <dd id="destView"></dd>
                            <dt>Type of Van:</dt>
                            <dd id="vanView"></dd>
                            <dt>Number of Days:</dt>
                            <dd id="daysView">5</dd>
                            <dt>Departure Date:</dt>
                            <dd id="dateView"></dd>
                            <dt>Departure Time:</dt>
                            <dd id="timeView"></dd>
                            </dl>
                        </div>
                    
                </div>


                
                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
        </div>
        <div class="box-footer">
            <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)" class = "btn btn-default">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1); getData();" class = "btn btn-primary">Next</button>
                    </div>
                </div>
                </form>
        </div>
    </div> 
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