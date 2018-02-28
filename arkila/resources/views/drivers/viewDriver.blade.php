@extends('layouts.master') @section('title', 'index') @section('links') @parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- additional CSS -->
<link rel="stylesheet" href="operatorStyle.css"> @stop @section('content')

<div class="box box-warning">
    <div class="box-header with-border text-center">
        <a href="" class="pull-left btn btn-default"><i class="fa  fa-chevron-left"></i></a>
        <h3 class="box-title">
            View Driver Information
        </h3>
    </div>

    <form id="regForm" action="/action_page.php">
        <div class="box-body">

            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <h4>Personal Information</h4>
                <div class="tab">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="driverLastName">Last Name:</label>
                            <p id="driverLastName" name="driverLastName" class="form-control" placeholder="Last Name" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="contactNumberD">Contact Number:</label>
                            <p id="contactNumberD" name="contactNumberD" class="form-control" placeholder="Contact Number" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="ageD">Age:</label>
                            <p id="ageD" name="ageD" class="form-control" placeholder="Age" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="genderD">Gender:</label>
                            <p id="genderD" name="genderD" class="form-control" placeholder="Age" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="sssD">SSS No:</label>
                            <p id="sssD" name="sssD" class="form-control" placeholder="SSS No." disabled></p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="driverFirstName">First Name:</label>
                            <p id="driverFirstName" name="driverFirstName" class="form-control" placeholder="First Name" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="addressD">Address:</label>
                            <p id="addressD" name="addressD" class="form-control" placeholder="Address" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="birthdateD">Birthdate:</label>
                            <p id="birthdateD" name="birthdateD" class="form-control" placeholder="Birthdate" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="citizenshipD">Citizenship:</label>
                            <p id="citizenshipD" name="citizenshipD" class="form-control" placeholder="Citizenship" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="licenseNoD">License No:</label>
                            <p id="licenseNoD" name="licenseNoD" class="form-control" placeholder="License No." disabled></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="driverMiddleName">Middle Name:</label>
                            <p id="driverMiddleName" name="driverMiddleName" class="form-control" placeholder="Middle Name" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="provincialAddressD">Provincial Address:</label>
                            <p id="provincialAddressD" name="provincialAddressD" class="form-control" placeholder="Provincial Address" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="birthplaceD">Birthplace:</label>
                            <p id="birthplaceD" name="birthplaceD" class="form-control" placeholder="Birthplace" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="civilStatusD">Civil Status:</label>
                            <p id="civilStatusD" name="civilStatusD" class="form-control" placeholder="Civil Status" disabled></p>
                        </div>
                        <div class="form-group">
                            <label for="licenseExpiryDateD">License Expiry Date:</label>
                            <p id="licenseExpiryDateD" name="licenseExpiryDateD" class="form-control" placeholder="License Expiry Date" disabled></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="box box-warning">
    <div class="box-body">
        <div class="tab">
            <h4>Family Information</h4>
            <div class="tab">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="spouseNameD">Name of Spouse:</label>
                        <p id="spouseNameD" name="spouseNameD" class="form-control" placeholder="Name of Spouse" disabled></p>
                    </div>
                    <div class="form-group">
                        <label for="fathersNameD">Fathers Name:</label>
                        <p id="fathersNameD" name="fathersNameD" class="form-control" placeholder="Fathers Name" disabled></p>
                    </div>
                    <div class="form-group">
                        <label for="mothersNameD">Mothers Name:</label>
                        <p id="mothersNameD" name="mothersNameD" class="form-control" placeholder="Mothers Name" disabled></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="spouseBirthDateD">Birthdate of Spouse:</label>
                        <p id="spouseBirthDateD" name="spouseBirthDateD" class="form-control" placeholder="Birthdate of Spouse" disabled></p>
                    </div>
                    <div class="form-group">
                        <label for="occupationFatherD">Occupation:</label>
                        <p id="occupationFatherD" name="occupationFatherD" class="form-control" placeholder="Occupation Father" disabled></p>
                    </div>
                    <div class="form-group">
                        <label for="occupationMotherD">Occupation:</label>
                        <p id="occupationMotherD" name="occupationMotherD" class="form-control" placeholder="Occupation Mother" disabled></p>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contactPersonD">Contact Person</label>
                        <p id="contactPersonD" name="contactPersonD" class="form-control" placeholder="Contact Person In Case of Emergency" disabled></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="addressD">Address</label>
                        <p id="addressD" name="addressD" class="form-control" placeholder="Address" disabled disabled></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contactNumberD">Contact Number</label>
                        <p id="contactNumberD" name="contactNumberD" class="form-control" placeholder="Contact Number" disabled></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="col-md-12">
                <Label for="dependentsO">Dependents:</Label>
                <table class="table table-hover custab">
                    <thead>
                        <th>Name</th>
                        <th>
                            <div class="col-md-7">Birthdate</div>
                        </th>
                    </thead>
                    <tbody id="childrens">
                        <tr>
                            <td>
                                <p placeholder="Name of Child" class="form-control" disabled></p>
                            </td>

                            <td>
                                <div class="col-md-7">
                                    <p id="childBirthDateD" name="childBirthDateD" class="form-control" placeholder="Contact Number" disabled></p>
                                </div>

                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
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