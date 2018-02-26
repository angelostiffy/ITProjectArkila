@extends('layouts.master') 
@section('title', 'Rent Van') 
@section('content-header', 'Rent Van') 
@section('content')
<div class="box box-primary">
    <div class="box-header">
        <h3>Van Rental</h3>
    </div>
    <div class="box-body">
        <form id="regForm" action="/action_page.php">

            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <h2>Trip Information</h2>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Last Name:</label>
                            <input type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label>Contact Number:</label>
                            <input type="text" class="form-control" placeholder="Contact Number">
                        </div>


                        <div class="form-group">
                            <label>Number of Days:</label>
                            <input class="form-control" type="number" placeholder="Number of Days">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>First Name:</label>
                            <input type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label>Destination:</label>
                            <input type="text" class="form-control" placeholder="Destination">
                        </div>
                        <div class="form-group">
                            <label>Departure Date:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Middle Name:</label>
                            <input type="text" class="form-control" placeholder="Middle Name">
                        </div>
                        <div class="form-group">
                            <label>Type of Van:</label>
                            <select class="form-control">
                       <option>Nissan Urvan</option>
                       <option>Nissan Urvan (NV350)</option>
                       <option>Toyota Hiace</option>
                       <option>Toyota Hiace Grandia</option>
                   </select>
                        </div>
                        <div class="form-group">
                            <label>Departure Time:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="timepicker">

                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <div class="tab">
                <h2>Summary of Rental</h2>
                <div class="row">
                    <dl class="dl-horizontal">
                        <dt>Name:</dt>
                        <dd>Caballar, Randall Elijah Foronda</dd>
                        <dt>Contact Number:</dt>
                        <dd>09991238473</dd>
                        <dt>Destination:</dt>
                        <dd>Brgy. Bobonot, Dasol, Pangasinan</dd>
                        <dt>Type of Van:</dt>
                        <dd>Nissan Urvan (NV350)</dd>
                        <dt>Number of Days:</dt>
                        <dd>5</dd>
                        <dt>Departure Date:</dt>
                        <dd>02/27/2018</dd>
                        <dt>Departure Time:</dt>
                        <dd>8:30 AM</dd>
                    </dl>
                </div>

            </div>

            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-primary">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary">Next</button>
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </form>
    </div>
</div>

@endsection 
@section('scripts') 
@parent
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
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>
<script>
    $(function() {
        alert("sample")
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })
        //Date picker
        $('#timepicker').timepicker({
            showInputs: false
        })

    })
</script>
@endsection