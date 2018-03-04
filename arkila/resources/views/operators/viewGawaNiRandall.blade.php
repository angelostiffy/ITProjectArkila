@extends('layouts.master') @section('title', 'View Operator') @section('links') @parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- additional CSS -->
<link rel="stylesheet" href="operatorStyle.css"> @stop @section('content')

<div class="box box-warning">
    <div class="box-header with-border text-center">
        <a href="{{URL::previous()}}" class="pull-left btn btn-default"><i class="fa  fa-chevron-left"></i></a>
        <h3 class="box-title">
            View Operator Information
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
                            <label for="operatorLastName">Last Name:</label>
                            <p id="driverLastName" name="driverLastName" class="form-control" placeholder="Last Name" disabled>{{$operator->last_name}} </p>
                        </div>
                        <div class="form-group">
                            <label for="contactNumberO">Contact Number:</label>
                            <p id="contactNumberO" name="contactNumberO" class="form-control" placeholder="Contact Number" disabled>{{$operator->edit_contact_number}}</p>
                        </div>
                        <div class="form-group">
                            <label for="ageO">Age:</label>
                            <p id="ageO" name="ageO" class="form-control" placeholder="Age" disabled>{{$operator->age}}</p>
                        </div>
                        <div class="form-group">
                            <label for="genderO">Gender:</label>
                            <p id="genderO" name="genderO" class="form-control" placeholder="Gender" disabled>{{$operator->gender}}</p>
                        </div>
                        <div class="form-group">
                            <label for="sssO">SSS No:</label>
                            <p id="sssO" name="sssO" type="text" class="form-control" placeholder="SSS No." disabled>{{$operator->SSS}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="operatorFirstName">First Name:</label>
                        <p id="operatorFirstName" name="operatorFirstName" class="form-control" placeholder="First Name" disabled>{{$operator->first_name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="addressO">Address:</label>
                        <p id="addressO" name="addressO" class="form-control" placeholder="Address" disabled>{{$operator->address}}</p>
                    </div>
                    <div class="form-group">
                        <label for="birthdateO">Birthdate:</label>
                        <p id="birthdateO" name="birthdateO" class="form-control" placeholder="Birthdate" disabled>{{$operator->birth_date}}</p>
                    </div>
                    <div class="form-group">
                        <label for="citizenshipO">Citizenship:</label>
                        <p id="citizenshipO" name="citizenshipO" class="form-control" placeholder="Citizenship" disabled>{{$operator->citizenship}}</p>
                    </div>
                    <div class="form-group">
                        <label for="licenseNoO">License No:</label>
                        <p id="licenseNoO" name="licenseNoO" class="form-control" placeholder="License No." disabled>{{$operator->license_number}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="operatorMiddleName">Middle Name:</label>
                        <p id="operatorMiddleName" name="operatorMiddleName" class="form-control" placeholder="Middle Name" disabled>{{$operator->middle_name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="provincialAddressO">Provincial Address:</label>
                        <p id="provincialAddressO" name="provincialAddressO" class="form-control" placeholder="Provincial Address" disabled>{{$operator->provincial_address}}</p>
                    </div>
                    <div class="form-group">
                        <label for="birthplaceO">Birthplace:</label>
                        <p id="birthplaceO" name="birthplaceO" class="form-control" placeholder="Birthplace" disabled>{{$operator->birth_place}}</p>
                    </div>
                    <div class="form-group">
                        <label for="civilStatusO">Civil Status:</label>
                        <p id="civilStatusO" name="civilStatusO" class="form-control" placeholder="Civil Status" disabled>{{$operator->civil_status}}</p>
                    </div>
                    <div class="form-group">
                        <label for="licenseExpiryDateO">License Expiry Date:</label>
                        <p id="licenseExpiryDateO" name="licenseExpiryDateO" class="form-control" placeholder="License Expiry" disabled>{{$operator->expiry_date}}</p>
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
                        <label for="spouseNameO">Name of Spouse:</label>
                        <p id="spouseNameO" name="spouseNameO" class="form-control" placeholder="Name of Spouse" disabled>{{$operator->spouse}}</p>
                    </div>
                    <div class="form-group">
                        <label for="fathersNameO">Fathers Name:</label>
                        <p id="fathersNameO" name="fathersNameO" class="form-control" placeholder="Fathers Name" disabled>{{$operator->father_name}}</p>
                    </div>
                    <div class="form-group">
                        <label for="mothersNameO">Mothers Name:</label>
                        <p id="mothersNameO" name="mothersNameO" class="form-control" placeholder="Mothers Name" disabled>{{$operator->mother_name}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="spouseBirthDateO">Birthdate of Spouse:</label>
                        <p id="spouseBirthDateO" name="spouseBirthDateO" class="form-control" placeholder="Spouse Birthday" disabled>{{$operator->spouse_birthdate}}</p>
                    </div>
                    <div class="form-group">
                        <label for="occupationFatherO">Occupation:</label>
                        <p id="occupationFatherO" name="occupationFatherO" class="form-control" placeholder="Occupation Father" disabled>{{$operator->father_occupation}}</p>
                    </div>
                    <div class="form-group">
                        <label for="occupationMotherO">Occupation:</label>
                        <p id="occupationMotherO" name="occupationMotherO" class="form-control" placeholder="Occupation Mother" disabled>{{$operator->mother_occupation}}</p>
                    </div>

                </div>
                <div class="tab">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="contactPersonO">Contact Person</label>
                            <p id="contactPersonO" name="contactPersonO" class="form-control" placeholder="Contact Person In Case of Emergency" disabled>{{$operator->person_in_case_of_emergency}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="addressO">Address</label>
                            <p id="addressO" name="addressO" class="form-control" placeholder="Address" disabled>{{$operator->emergency_address}}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="contactNumberO">Contact Number</label>
                            <p id="contactNumberO" name="contactNumberO" class="form-control" placeholder="Contact Number" disabled>{{$operator->emergency_contactno}}</p>
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
                                @if($operator->children) @foreach($operator->children as $child)
                                <tr>
                                    <td>
                                        <p placeholder="Name of Child" class="form-control" disabled>{{$child->child_name}}</p>
                                    </td>
                                    <td>
                                        <div class="col-md-7">
                                            <p id="childBirthDateO" name="childBirthDateO" class="form-control" placeholder="Operator Child Birthday" disabled>{{$child->birthdate}}</p>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach @endif
                            </tbody>
                        </table>

                    </div>
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