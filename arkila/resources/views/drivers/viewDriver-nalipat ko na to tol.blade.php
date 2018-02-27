@extends('layouts.master') @section('title', 'index') @section('links') @parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- additional CSS -->
<link rel="stylesheet" href="operatorStyle.css"> @stop @section('content')

<a href="operatorProfile.html" class="btn btn-outline-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>

<div class="box ">
                    <div class="box box-header">
                        <h3 style="margin-right: 10px; display: inline-block;"><strong>View Driver Information</strong></h3><button class="btn btn-outline-info" style="float: right; margin-top: 2%;"><i class="fa fa-pencil-square-o"></i> Edit</button>
                    </div>
                    <form id="f_1" action="#" onsubmit="return false;" class="form-horizontal">
                        <div class="box-body">
                            <div class="box box-header">
                                <h4>Personal Information</h4>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group rows">
                                    <label for="driverName" class="control-label col-sm-4">Driver Name</label>
                                    <div class="col-sm-4">
                                        <p id="driverName" name="driverName" class="control-label pull-right">asd</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="operatorName" class="control-label col-sm-4">Operator Name</label>
                                    <div class="col-sm-4">
                                        <p id="operatorName" name="operatorName" class="control-label pull-right">ssadfasddas</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ageD" class="control-label col-sm-4">Age</label>
                                    <div class="col-sm-4">
                                        <p id="ageD" name="ageD" class="control-label pull-right">ssadfasddas</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="contactNumberD" class="control-label col-sm-4">Contact number</label>
                                    <div class="col-sm-4">
                                        <p id="contactNumberD" name="contactNumberD" class="control-label pull-right">ssadfasddas</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="addressD" class="control-label col-sm-4">Address</label>
                                    <div class="col-sm-4">
                                        <p id="addressD" name="addressD" class="control-label pull-right">ssadfasddas</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="provincialAddressD" class="control-label col-sm-4">Provincial address</label>
                                    <div class="col-sm-4">
                                        <p id="provincialAddressD" name="provincialAddressD" class="control-label pull-right">ssadfasddas</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birthDateD" class="control-label col-sm-4">Date of birth</label>
                                    <div class="col-sm-4">
                                        <p id="birthDateD" name="birthDateD" class="control-label pull-right">ssadfasddas</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birthPlaceD" class="control-label col-sm-4">Place of birth</label>
                                    <div class="col-sm-4">
                                        <p id="birthPlaceD" name="birthPlaceD" class="control-label pull-right">ssadfasddas</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="genderD" class="control-label col-sm-4">Gender</label>
                                    <div class="col-sm-4">
                                        <p id="genderD" name="genderD" class="control-label pull-right">fsdsdfsd</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="citizenshipD" class="control-label col-sm-4">Citizenship</label>
                                    <div class="col-sm-4">
                                        <p id="citizenshipD" name="citizenshipD" class="control-label pull-right">fsdsdfsd</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="civilStatusD" class="control-label col-sm-4">Civil status</label>
                                    <div class="col-sm-4">
                                        <p id="civilStatusD" name="civilStatusD" class="control-label pull-right">fsdsdfsd</p>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="sssD" class="control-label col-sm-4">SSS number</label>
                                    <div class="col-sm-4">
                                        <p id="sssD" name="sssD" class="control-label pull-right">fsdsdfsd</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">

                            <div class="box box-header">
                                <h4>Family Information</h4>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="fatherNameD" class="control-label col-sm-4">Name of Father</label>
                                    <div class="col-sm-4">
                                        <p id="fatherNameD" name="fatherNameD" class="control-label pull-right">fsdsdfsd</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fatherOccupationD" class="control-label col-sm-4">Occupation of Father</label>
                                    <div class="col-sm-4">
                                        <p id="fatherOccupationD" name="fatherOccupationD" class="control-label pull-right">fsdsdfsd</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="motherNameD" class="control-label col-sm-4">Name of Mother</label>
                                    <div class="col-sm-4">
                                        <p id="motherNameD" name="motherNameD" class="control-label pull-right">fsdsdfsd</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="motherOccupationD" class="control-label col-sm-4">Occupation of Mother</label>
                                    <div class="col-sm-4">
                                        <p id="motherOccupationD" name="motherOccupationD" class="control-label pull-right">fsdsdfsd</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="personCasedOfEmergencyD" class="control-label col-sm-4">Contact person</label>
                                    <div class="col-sm-4">
                                        <p id="personCasedOfEmergencyD" name="personCasedOfEmergencyD" class="control-label pull-right">ssadfasddas</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emergencyContactD" class="control-label col-sm-4">Emergency contact no.</label>
                                    <div class="col-sm-4">
                                        <p id="emergencyContactD" name="emergencyContactD" class="control-label pull-right">ssadfasddas</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emergencyAddressD" class="control-label col-sm-4">Emergency address</label>
                                    <div class="col-sm-4">
                                        <p id="emergencyAddressD" name="emergencyAddressD" class="control-label pull-right">ssadfasddas</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="spouseD" class="control-label col-sm-4">Spouse</label>
                                    <div class="col-sm-4">
                                        <p id="spouseD" name="spouseD" class="control-label pull-right">fsdsdfsd</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="spouseBirthdateD" class="control-label col-sm-4">Spouse birthdate</label>
                                    <div class="col-sm-4">
                                        <p id="spouseBirthdateD" name="spouseBirthdateD" class="control-label pull-right">fsdsdfsd</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="numberOfChildrenD" class="control-label col-sm-4">Number of children</label>
                                    <div class="col-sm-4">
                                        <p id="numberOfChildrenD" name="numberOfChildrenD" class="control-label pull-right">fsdsdfsd</p>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="numberOfChildrenO" class="control-label col-sm-4">Names of children</label>
                                    <div class="col-sm-4">
                                        <ul class="control-label pull-right" style="list-style: none;">
                                            <li>akoasdasdasdasdas</li>
                                            <li>ako</li>
                                            <li>ako</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                    <div class="box-footer">
                        <button class="btn btn-outline-primary pull-right">Save changes</button>
                    </div>
                </div>
</form>
</div>
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