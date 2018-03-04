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
@section('title', 'Driver Registration')
@section('form-id', 'regForm')

@if ( isset($operator) )
    @section('form-action',route('drivers.storeFromOperator',[$operator->member_id]))
    @section('backRef') {{ route('operators.showProfile',[$operator->member_id]) }} @endsection
@elseif ( isset($vanNd) )
    @section('form-action',route('drivers.storeFromVan',[$vanNd->plate_number]))
    @if(session()->get('vanBack'))
        @section('backRef') {{ session()->get('vanBack') }} @endsection
    @else
        @section('backRef') {{ route('vans.index') }} @endsection
    @endif
@else
    @section('form-action',route('drivers.store'))
    @section('backRef') {{ route('drivers.index',[$operator->member_id]) }} @endsection
@endif


@section('form-body')
<div class="box box-warning">
        <div class="box-header with-border text-center">
            <a href="@yield('backRef')" class="pull-left btn btn-default"><i class="fa  fa-chevron-left"></i></a>
            <h3 class="box-title">
                Driver Registration
            </h3>
        </div>
        <div class="box-body">

                <!-- One "tab" for each step in the form: -->
                <div class="tab">
                    <h4>Personal Information</h4>
                    @include('message.error')
                    <div class="row">
                        <div class="col-md-4">
                        <div class=" form-group">
                            @if(isset($operator))
                                <label for"opName">Operator Name:</label>
                                <span id="opName">{{$operator->full_name}}</span>
                            @elseif(isset($vanNd))
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Van Unit</label>
                                        <span id="">{{ $vanNd->plate_number}}</span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Operator of the Van Unit</label>
                                        <span id="">{{ $vanNd->operator->first()->full_name}}</span>
                                    </div>
                                </div>

                                @else
                                <label>Choose Operator:</label>
                                <select name="operator" id="" class="form-control select2">
                                    <option value='' @if(!old('operator')) {{'selected'}} @endif>No Operator</option>
                                    @foreach($operators as $operator)
                                        <option value={{$operator->member_id}} @if($operator->member_id == old('operator')) {{'selected'}}@endif>{{$operator->full_name}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Last Name:</label>
                                <input value="{{old('lastName')}}" name="lastName" type="text" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>First Name:</label>
                                <input value="{{old('firstName')}}" name="firstName" type="text" class="form-control" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Middle Name:</label>
                                <input value="{{old('middleName')}}" name="middleName" type="text" class="form-control" placeholder="Middle Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                             <div class="form-group">
                                <label>Contact Number:</label>
                                <input value="{{old('contactNumber')}}" name="contactNumber" type="text" class="form-control" placeholder="Contact Number">
                            </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group">
                                <label>Address:</label>
                                <input value="{{old('address')}}" name="address" type="text" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Provincial Address:</label>
                                <input value="{{old('provincialAddress')}}" name="provincialAddress" type="text" class="form-control" placeholder="Provincial Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Birthdate:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input value="{{old('birthDate')}}" name="birthDate" type="text" class="form-control pull-right datepicker">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Birthplace:</label>
                                <input value="{{old('birthPlace')}}" name="birthPlace" type="text" class="form-control" placeholder="Birthplace">
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Gender:</label>
                                <div class="radio">
                                    <label for=""> Male</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender"  value="Male" class="flat-blue" @if(old('gender') == 'Male') {{'checked'}}@endif>
                                    </label>
                                    <label for="">Female</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="Female" class="flat-blue" @if(old('gender') == 'Female') {{'checked'}}@endif>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Citizenship:</label>
                                <input value="{{old('citizenship')}}" name="citizenship" type="text" class="form-control" placeholder="Citizenship">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Civil Status:</label>
                                <select name="civilStatus" class="form-control">
                                   <option value="Single" @if(old('civilStatus') == 'Single') {{'selected'}} @endif>Single</option>
                                   <option value="Married" @if(old('civilStatus') == 'Married') {{'selected'}} @endif>Married</option>
                                   <option value="Divorced" @if(old('civilStatus') == 'Divorced') {{'selected'}} @endif>Divorced</option>
                               </select>
                            </div>
                        </div>
                   
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>SSS No:</label>
                                <input value="{{old('sss')}}" name="sss" type="text" class="form-control" placeholder="SSS No.">
                            </div>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>License No:</label>
                                <input value="{{old('licenseNo')}}" name="licenseNo" type="text" class="form-control" placeholder="License No.">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>License Expiry Date:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input value="{{old('licenseExpiryDate')}}" name="licenseExpiryDate" type="text" class="form-control pull-right datepicker">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <h4>Family Information</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name of Spouse:</label>
                                <input value="{{old('nameOfSpouse')}}" name="nameOfSpouse" type="text" class="form-control" placeholder="Name of Spouse">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Birthdate of Spouse:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input value="{{old('spouseBirthDate')}}" name="spouseBirthDate" type="text" class="form-control pull-right datepicker">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fathers Name:</label>
                                <input value="{{old('fathersName')}}" name="fathersName" type="text" class="form-control" placeholder="Fathers Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Occupation:</label>
                                <input value="{{old('fatherOccupation')}}" name="fatherOccupation" type="text" class="form-control" placeholder="Occupation">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Mothers Name:</label>
                                <input value="{{old('mothersName')}}" name="mothersName" type="text" class="form-control" placeholder="Mothers Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Occupation:</label>
                                <input value="{{old('motherOccupation')}}" name="motherOccupation" type="text" class="form-control" placeholder="Occupation">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Contact Person</label>
                                <input value="{{old('contactPerson')}}" name="contactPerson" type="text" class="form-control" placeholder="Contact Person In Case of Emergency">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address</label>
                                <input value="{{old('contactPersonAddress')}}" name="contactPersonAddress" type="text" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input value="{{old('contactPersonContactNumber')}}" name="contactPersonContactNumber" type="text" class="form-control" placeholder="Contact Number">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <Label>Dependents:</Label>
                            <table class="table table-hover custab">
                                <thead>
                                    <th>Name</th>
                                    <th>Birthdate</th>
                                    <th>
                                        <div class="pull-right">
                                            <button type="button" class="btn btn-info" onclick="addItem()"><i class="fa fa-plus-circle"></i> Add Item</button>
                                        </div>
                                    </th>
                                </thead>
                                <tbody id="childrens">

                                @if(old('children'))

                                    @for($i = 0; $i < count(old('children')); $i++)
                                        <tr>
                                            <td>
                                                <input value="{{old('children.'.$i)}}" name="children[]" type="text" placeholder="Name of Child" class="form-control">
                                            </td>
                                            <td>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input value="{{old('childrenBDay.'.$i)}}" name="childrenBDay[]" type="text" class="form-control pull-right datepicker">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="pull-right">
                                                    <button style="display: none;" type="button" onclick="event.srcElement.parentElement.parentElement.parentElement.remove();rmv()" class='btn btn-danger'>Delete</button>
                                                </div>
                                            </td>

                                        </tr>
                                    @endfor
                                @else
                                    <tr>
                                        <td>
                                            <input name="children[]" type="text" placeholder="Name of Child" class="form-control">
                                        </td>
                                        <td>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input name="childrenBDay[]" type="text" class="form-control pull-right datepicker">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="pull-right">
                                                <button style="display: none;" type="button" onclick="event.srcElement.parentElement.parentElement.parentElement.remove();rmv()" class='btn btn-danger'>Delete</button>
                                            </div>
                                        </td>

                                    </tr>
                                @endif

                                </tbody>
                            </table>

                        </div>
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
                        <button type="button" id="nextBtn" onclick="nextPrev(1)" class = "btn btn-primary">Next</button>
                    </div>
                </div>
        </div>
    </div> 
@endsection
@section('scripts')
@parent
 <script>    

        $(cloneDatePicker());

        function cloneDatePicker() {

            //Date picker
            $('.datepicker').datepicker({
                autoclose: true
            })

        }



        function addItem() {
            var tablebody = document.getElementById('childrens');
            if (tablebody.rows.length == 1) {
                tablebody.rows[0].cells[tablebody.rows[0].cells.length - 1].children[0].children[0].style.display = "";
            }   


            var tablebody = document.getElementById('childrens');
            var iClone = tablebody.children[0].cloneNode(true);
            for (var i = 0; i < iClone.cells.length; i++) {
                iClone.cells[i].children[0].value = "";
                iClone.cells[1].children[0].children[1].value="";
            
            }
            tablebody.appendChild(iClone);
            cloneDatePicker();
        }
        

        function rmv() {
            var tabRow = document.getElementById("childrens");
            if (tabRow.rows.length == 1) {
                tabRow.rows[0].cells[tabRow.rows[0].cells.length - 1].children[0].children[0].style.display = "none";
            } else {
                tabRow.rows[0].cells[tabRow.rows[0].cells.length - 1].children[0].children[0].style.display = "";
            }
        }
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
    </script>

    <script>
    $(function () {

        $('.select2').select2();

        $('#datepicker').datepicker({
          autoclose: true
        });

        $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass   : 'iradio_flat-blue'
        });
    })
    </script>
@endsection