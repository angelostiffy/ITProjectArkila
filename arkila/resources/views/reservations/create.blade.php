@extends('layouts.form_lg') 
@section('title', 'Book a Seat') 
@section('form-id', 'regForm') 
@section('form-action', route('reservations.store')) 
@section('form-method', 'POST') 
@section('form-body') {{csrf_field()}}
@section('backRef') {{ route('reservations.index') }} @endsection

<div class="box box-success">
    <div class="box-header with-border text-center">
        <a href="@yield('backRef')"><i class="fa  fa-chevron-left"></i></a>
        <h3 class="box-title">
            Book a Seat
        </h3>
    </div>
    <div class="box-body">
    @include('message.error')

        <div class="tab">
            <h4>Trip Information</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name: <span class="text-red">*</span></label>
                        <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ old('name') }}" maxlength='30' required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Contact Number: <span class="text-red">*</span></label>
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
                        <label>Departure Date: <span class="text-red">*</span></label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
               
                            <input type="text" name="date" id="date" class="form-control" placeholder="mm/dd/yyyy" value="{{old('date')}}" data-inputmask=" 'alias': 'mm/dd/yyyy'" data-mask>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Destination: <span class="text-red">*</span></label>
                        <select class="form-control select2" name="dest" id="dest" required>
                                    <option value="" disabled selected>Select Destination</option>
                                @foreach ($destinations as $destination)
                                   <option value="{{ $destination->description }}" @if($destination->description == old('dest') ) {{'selected'}} @endif>{{ $destination->description }}</option>
                                   @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Number of Seats: <span class="text-red">*</span></label>
                        <input type="number" class="form-control" placeholder="Number of Seats" name="seat" id="seat" value="{{ old('seat') }}" min="1" max="15" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Departure Time: <span class="text-red">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="timepicker" name="time" value="{{ old('time') }}" required>
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab" style="margin-left:37%; font-size: 14pt">
        <h4 style="margin-left:17%; margin-bottom:3%; font-size: 14pt">Summary</h4>
        <div class="row">
            <dl class="dl-horizontal">
                <dt>Name:</dt>
                <dd id="nameView"></dd>
                <dt>Destination:</dt>
                <dd id="destView"></dd>
                <dt>Number of Days:</dt>
                <dd id="seatView"></dd>
                <dt>Contact Number:</dt>
                <dd id="contactView"></dd>
                <dt>Departure Date:</dt>
                <dd id="dateView"></dd>
                <dt>Departure Time:</dt>
                <dd id="timeView"></dd>
            </dl>
        </div>
    </div>
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
    </div>

<div class="box box-footer">
    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-default btn-sm">Previous</button>
            <button type="button" id="nextBtn" onclick="nextPrev(1); getData();" class="btn btn-primary btn-sm">Next</button>
        </div>
    </div>
</div>
</div>

@endsection @section('scripts') @parent
<script>
    
    $(function() {

        //Date picker
        $('#timepicker').timepicker({
            showInputs: false
            // startTime: new Time();
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
        var name = document.getElementById('name').value;
        document.getElementById('nameView').textContent = name;

        var contactNumber = document.getElementById('contactNumber').value;
        document.getElementById('contactView').textContent = contactNumber;

        var destination = document.getElementById('dest').value;
        document.getElementById('destView').textContent = destination;

        var seat = document.getElementById('seat').value;
        document.getElementById('seatView').textContent = seat;

        var date = document.getElementById('date').value;
        document.getElementById('dateView').textContent = date;

        var time = document.getElementById('timepicker').value;
        document.getElementById('timeView').textContent = time;

    }
    
    $('[data-mask]').inputmask()
</script>
@endsection