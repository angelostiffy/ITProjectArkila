@extends('layouts.master') @section('title', 'index') @section('links') @parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- additional CSS -->
<link rel="stylesheet" href="operatorStyle.css"> @stop @section('content')

<a href="operatorProfile.html" class="btn btn-outline-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
<!-- Content Header (Page header) -->
<section class="content-header">

    <div class="box ">
        <div class="box box-header">
            <h3 style="margin-right: 10px; display: inline-block;"><strong>View Operator Information</strong></h3>
            <a href="" class="btn btn-outline-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>
        </div>
        <form id="f_1" action="#" onsubmit="return false;" class="form-horizontal">
            <div class="box-body">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="operatorName" class="control-label col-sm-4">Operator Name</label>
                        <div class="col-sm-4">
                            <p id="operatorName" name="operatorName" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contactNumberO" class="control-label col-sm-4">Contact number</label>
                        <div class="col-sm-4">
                            <p id="contactNumberO" name="contactNumberO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="addressO" class="control-label col-sm-4">Address</label>
                        <div class="col-sm-4">
                            <p id="addressO" name="addressO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="provincialAddressO" class="control-label col-sm-4">Provincial address</label>
                        <div class="col-sm-4">
                            <p id="provincialAddressO" name="provincialAddressO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ageO" class="control-label col-sm-4">Age</label>
                        <div class="col-sm-4">
                            <p id="ageO" name="ageO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birthDateO" class="control-label col-sm-4">Date of birth</label>
                        <div class="col-sm-4">
                            <p id="birthDateO" name="birthDateO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birthPlaceO" class="control-label col-sm-4">Place of birth</label>
                        <div class="col-sm-4">
                            <p id="birthPlaceO" name="birthPlaceO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="personCasedOfEmergencyO" class="control-label col-sm-4">Contact person</label>
                        <div class="col-sm-4">
                            <p id="personCasedOfEmergencyO" name="personCasedOfEmergencyO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emergencyContactO" class="control-label col-sm-4">Emergency contact no.</label>
                        <div class="col-sm-4">
                            <p id="emergencyContactO" name="emergencyContactO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emergencyAddressO" class="control-label col-sm-4">Emergency address</label>
                        <div class="col-sm-4">
                            <p id="emergencyAddressO" name="emergencyAddressO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sssO" class="control-label col-sm-4">SSS number</label>
                        <div class="col-sm-4">
                            <p id="sssO" name="sssO" class="control-label pull-right"></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="genderO" class="control-label col-sm-4">Gender</label>
                        <div class="col-sm-4">
                            <p id="genderO" name="genderO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="citizenshipO" class="control-label col-sm-4">Citizenship</label>
                        <div class="col-sm-4">
                            <p id="citizenshipO" name="citizenshipO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="civilStatusO" class="control-label col-sm-4">Civil status</label>
                        <div class="col-sm-4">
                            <p id="civilStatusO" name="civilStatusO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="numberOfChildrenO" class="control-label col-sm-4">Number of children</label>
                        <div class="col-sm-4">
                            <p id="numberOfChildrenO" name="numberOfChildrenO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="spouseO" class="control-label col-sm-4">Spouse</label>
                        <div class="col-sm-4">
                            <p id="spouseO" name="spouseO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="spouseBirthdateO" class="control-label col-sm-4">Spouse birthdate</label>
                        <div class="col-sm-4">
                            <p id="spouseBirthdateO" name="spouseBirthdateO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fatherNameO" class="control-label col-sm-4">Name of Father</label>
                        <div class="col-sm-4">
                            <p id="fatherNameO" name="fatherNameO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fatherOccupationO" class="control-label col-sm-4">Occupation of Father</label>
                        <div class="col-sm-4">
                            <p id="fatherOccupationO" name="fatherOccupationO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="motherNameO" class="control-label col-sm-4">Name of Mother</label>
                        <div class="col-sm-4">
                            <p id="motherNameO" name="motherNameO" class="control-label pull-right"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="motherOccupationO" class="control-label col-sm-4">Occupation of Mother</label>
                        <div class="col-sm-4">
                            <p id="motherOccupationO" name="motherOccupationO" class="control-label pull-right"></p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    <div class="box-footer">
        <button type="button" class="btn btn-outline-primary pull-right" onclick="grayer('f_1',true);">Save changes</button>
    </div>




    @stop @section('scripts') @parent

    <!-- DataTables -->
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function() {
            $('#driver').DataTable()
            $('#van').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true
            })
        })
    </script>

    @stop