@extends('layouts.form_lg')
@section('links')
@parent
<style>
        /* Mark input boxes that gets an error on validation: */

        /* Hide all steps by default: */

        .tab {
            display: none;
        }

        /* Make circles that indicate the steps of the form: */

        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */

        .step.finish {
            background-color: #4CAF50;
        }
    </style>
@endsection
@section('title', 'Rent Van')
@section('form-id', 'regForm')
@section('form-action', route('rental.store'))
@section('form-method', 'POST')
@section('form-body')

                               {{csrf_field()}}     
<div class="box box-warning" style = "box-shadow: 0px 5px 10px gray;">
        <div class="box-header with-border text-center">
            <a href="{{ URL::previous() }}" class="pull-left btn btn-default"><i class="fa  fa-chevron-left"></i></a>
            <h3 class="box-title">
                Rent a Van
            </h3>
        </div>
        <div class="box-body">
        @include('message.error')

                <!-- One "tab" for each step in the form: -->
                <div class="tab">
                    <h4>Trip Information</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name:</label>
                                <input type="text" class="form-control" placeholder="Last Name" name="lastName" id="lastName" value="{{ old('lastName') }}" maxlength="35">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Name:</label>
                                <input type="text" class="form-control" placeholder="First Name" name="firstName" id="firstName" value="{{ old('firstName') }}" maxlength="35">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Middle Name:</label>
                                <input type="text" class="form-control" placeholder="Middle Name" name="middleName" id="middleName" value="{{ old('middleName') }}" maxlength="35">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                             <div class="form-group">
                                <label>Contact Number:</label>
                                <div class = "input-group">
                                    <div class = "input-group-addon">
                                        <span>+63</span>
                                    </div>
                                <input type="text" class="form-control" placeholder="Contact Number" name="contactNumber" id="contactNumber" value="{{ old('contactNumber') }}" data-inputmask='"mask": "999-999-9999"' data-mask>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label>Destination:</label>
                                <input type="text" class="form-control" placeholder="Destination" name="destination" id="destination" value="{{ old('destination') }}" maxlength="35">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Type of Van:</label>
                                <select class="form-control" name="model" id="model">
                                    <option value="" disabled selected>Select Model</option>
                                @foreach ($models as $model)
                                   <option value="{{ $model->description }}" @if($model->description == old('model') ) {{'selected'}} @endif>{{ $model->description }}</option>
                                   @endforeach
                               </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Number of Days:</label>
                                <input type="number" class="form-control" placeholder="Number of Days" name="days" id="days" value="{{ old('days') }}" min="1" max="15">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Departure Date:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" name="date" id="date" value="{{ old('date') }}" placeholder="mm/dd/yyyy" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class = "bootstrap-timepicker">
                            <div class="form-group">
                                <label>Departure Time:</label>
                                 <div class="input-group">
                    <input type="time" class="form-control" name="time" value="{{ old('time') }}">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    </div>
                  </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="tab" style="margin-left:37%; font-size: 14pt">
                    <h4 style="margin-left:17%; margin-bottom:3%; font-size: 14pt">Summary</h4>
                    <div class = "row">
                           <dl class = "dl-horizontal">
                           <dt>Name:</dt>
                            <dd id="nameView"></dd>
                            <dt>Contact Number:</dt>
                            <dd id="contactView"></dd>
                            <dt>Destination:</dt>
                            <dd id="destView"></dd>
                            <dt>Van Model:</dt>
                            <dd id="vanView"></dd>
                            <dt>Number of Days:</dt>
                            <dd id="daysView"></dd>
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

            var date = document.getElementById('date').value;
            document.getElementById('dateView').textContent = date;

            var time = document.getElementById('timepicker').value;
            document.getElementById('timeView').textContent = time;
        }
        
    </script>
    <script>
    $('[data-mask]').inputmask()
    </script>
@endsection