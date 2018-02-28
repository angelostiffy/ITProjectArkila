@extends('layouts.master') @section('title', 'View Operator') @section('links') @parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- additional CSS -->
<link rel="stylesheet" href="operatorStyle.css"> @stop @section('content')

<a href="operatorProfile.html" class="btn btn-outline-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
<!-- Content Header (Page header) -->
<section class="content-header">

<div class="content-wrapper">
        <!-- Content Wrapper. Contains page content -->
            <section class="content-header">
                <div class="box box-warning">
                    <div class="box-header with-border text-center">
                        <a href="" class="pull-left btn btn-default"><i class="fa  fa-chevron-left"></i></a>
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
                                            <p id="driverLastName" name="driverLastName" type="text" class="form-control" placeholder="Last Name">{{$operator->last_name}} </p>
                                        </div>
                                        <div class="form-group">
                                            <label for="contactNumberO">Contact Number:</label>
                                            <p id="contactNumberO" name="contactNumberO" type="text" class="form-control" placeholder="Contact Number">{{$operator->edit_contact_number}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="ageO">Age:</label>
                                            <p id="ageO" name="ageO" type="number" class="form-control" placeholder="Age">{{$operator->age}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="genderO">Gender:</label>
                <p>{{$operator->gender}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="sssO">SSS No:</label>
                                            <p id="sssO" name="sssO" type="text" class="form-control" placeholder="SSS No.">{{$operator->SSS}}</p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="operatorFirstName">First Name:</label>
                                            <p id="operatorFirstName" name="operatorFirstName" type="text" class="form-control" placeholder="First Name">{{$operator->first_name}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="addressO">Address:</label>
                                            <p id="addressO" name="addressO" type="text" class="form-control" placeholder="Address">{{$operator->address}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthdateO">Birthdate:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <p id="birthdateO" name="birthdateO" type="text" class="form-control pull-right datepicker">{{$operator->birth_date}}</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="citizenshipO">Citizenship:</label>
                                            <p id="citizenshipO" name="citizenshipO" type="text" class="form-control" placeholder="Citizenship">{{$operator->citizenship}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="licenseNoO">License No:</label>
                                            <p id="licenseNoO" name="licenseNoO" type="text" class="form-control" placeholder="License No.">{{$operator->license_number}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="operatorMiddleName">Middle Name:</label>
                                            <p id="operatorMiddleName" name="operatorMiddleName" type="text" class="form-control" placeholder="Middle Name">{{$operator->middle_name}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="provincialAddressO">Provincial Address:</label>
                                            <p id="provincialAddressO" name="provincialAddressO" type="text" class="form-control" placeholder="Provincial Address">{{$operator->provincial_address}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthplaceO">Birthplace:</label>
                                            <p id="birthplaceO" name="birthplaceO" type="text" class="form-control" placeholder="Birthplace">{{$operator->birth_place}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="civilStatusO">Civil Status:</label>
   <p>{{$operator->civil_status}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="licenseExpiryDateO">License Expiry Date:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <p id="licenseExpiryDateO" name="licenseExpiryDateO" type="text" class="form-control pull-right datepicker">{{$operator->expiry_date}}</p>
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
                                            <label for="spouseNameO">Name of Spouse:</label>
                                            <p id="spouseNameO" name="spouseNameO" type="text" class="form-control" placeholder="Name of Spouse">{{$operator->spouse}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="fathersNameO">Fathers Name:</label>
                                            <p id="fathersNameO" name="fathersNameO" type="text" class="form-control" placeholder="Fathers Name">{{$operator->father_name}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="mothersNameO">Mothers Name:</label>
                                            <p id="mothersNameO" name="mothersNameO" type="number" class="form-control" placeholder="Mothers Name">{{$operator->mother_name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="spouseBirthDateO">Birthdate of Spouse:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <p id="spouseBirthDateO" name="spouseBirthDateO" type="text" class="form-control pull-right datepicker">{{$operator->spouse_birthdate}}</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="occupationFatherO">Occupation:</label>
                                            <p id="occupationFatherO" name="occupationFatherO" type="text" class="form-control" placeholder="Occupation">{{$operator->father_occupation}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="occupationMotherO">Occupation:</label>
                                            <p id="occupationMotherO" name="occupationMotherO" type="text" class="form-control" placeholder="Occupation">{{$operator->mother_occupation}}</p>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contactPersonO">Contact Person</label>
                                            <p id="contactPersonO" name="contactPersonO" type="text" class="form-control" placeholder="Contact Person In Case of Emergency">{{$operator->person_in_case_of_emergency}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="addressO">Address</label>
                                            <p id="addressO" name="addressO" type="text" class="form-control" placeholder="Address">{{$operator->emergency_address}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contactNumberO">Contact Number</label>
                                            <p id="contactNumberO" name="contactNumberO" type="text" class="form-control" placeholder="Contact Number">{{$operator->emergency_contactno}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <Label for="dependentsO">Dependents:</Label>
                                        <table class="table table-hover custab">
                                            <thead>
                                                <th>Name</th>
                                                <th>Birthdate</th>
                                                
                                            </thead>
                                            <tbody id="childrens">
                                            @if($operator->children)
                                                @foreach($operator->children as $child)
                                                <tr>
                                                    <td>
                                                        <p type="text" placeholder="Name of Child" class="form-control">{{$child->child_name}}</p>
                                                    </td>
                                                    <td>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <p type="text" class="form-control pull-right datepicker">{{$child->birthdate}}</p>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="pull-right">
                                                            <button style="display: none;" type="button" onclick="event.srcElement.parentElement.parentElement.parentElement.remove();rmv()" class='btn btn-danger'>Delete</button>
                                                        </div>
                                                    </td>

                                                </tr>
                                                @endforeach
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
                        </div>
                    </form>
                </div>
                </form>
        </div>
    </form>




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