@extends('layouts.master')
@section('title', 'index')
@section('links')
    @parent
    <!-- DataTables -->
    <link rel= "stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- additional CSS -->
    <link rel="stylesheet" href="operatorStyle.css">

@stop
@section('content')
    <div class="box box-warning">
        <div class="box-header with-border text-center">
            <a href="" class="pull-left btn btn-default"><i class="fa  fa-chevron-left"></i></a>
            <h3 class="box-title">
                Edit Operator Information
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
                                <input id="driverLastName" name="driverLastName" type="text" class="form-control" placeholder="Last Name">
                            </div>
                            <div class="form-group">
                                <label for="contactNumberO">Contact Number:</label>
                                <input id="contactNumberO" name="contactNumberO" type="text" class="form-control" placeholder="Contact Number">
                            </div>
                            <div class="form-group">
                                <label for="ageO">Age:</label>
                                <input id="ageO" name="ageO" type="number" class="form-control" placeholder="Age">
                            </div>
                            <div class="form-group">
                                <label for="genderO">Gender:</label>
                                <div class="radio">
                                    <label for="genderMaleO"> Male</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="genderMaleO" id="genderMaleO" value="male" class="flat-blue">
                                    </label>
                                    <label for="genderFemaleO">Female</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="genderFemaleO" id="genderFemaleO" value="female" class="flat-blue">

                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sssO">SSS No:</label>
                                <input id="sssO" name="sssO" type="text" class="form-control" placeholder="SSS No.">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="operatorFirstName">First Name:</label>
                                <input id="operatorFirstName" name="operatorFirstName" type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <label for="addressO">Address:</label>
                                <input id="addressO" name="addressO" type="text" class="form-control" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="birthdateO">Birthdate:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="birthdateO" name="birthdateO" type="text" class="form-control pull-right datepicker">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="citizenshipO">Citizenship:</label>
                                <input id="citizenshipO" name="citizenshipO" type="text" class="form-control" placeholder="Citizenship">
                            </div>
                            <div class="form-group">
                                <label for="licenseNoO">License No:</label>
                                <input id="licenseNoO" name="licenseNoO" type="text" class="form-control" placeholder="License No.">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="operatorMiddleName">Middle Name:</label>
                                <input id="operatorMiddleName" name="operatorMiddleName" type="text" class="form-control" placeholder="Middle Name">
                            </div>
                            <div class="form-group">
                                <label for="provincialAddressO">Provincial Address:</label>
                                <input id="provincialAddressO" name="provincialAddressO" type="text" class="form-control" placeholder="Provincial Address">
                            </div>
                            <div class="form-group">
                                <label for="birthplaceO">Birthplace:</label>
                                <input id="birthplaceO" name="birthplaceO" type="text" class="form-control" placeholder="Birthplace">
                            </div>
                            <div class="form-group">
                                <label for="civilStatusO">Civil Status:</label>
                                <select id="civilStatusO" name="civilStatusO" class="form-control">
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Divorced</option>
                                    <option>Widowed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="licenseExpiryDateO">License Expiry Date:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="licenseExpiryDateO" name="licenseExpiryDateO" type="text" class="form-control pull-right datepicker">
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
                                <input id="spouseNameO" name="spouseNameO" type="text" class="form-control" placeholder="Name of Spouse">
                            </div>
                            <div class="form-group">
                                <label for="fathersNameO">Fathers Name:</label>
                                <input id="fathersNameO" name="fathersNameO" type="text" class="form-control" placeholder="Fathers Name">
                            </div>
                            <div class="form-group">
                                <label for="mothersNameO">Mothers Name:</label>
                                <input id="mothersNameO" name="mothersNameO" type="number" class="form-control" placeholder="Mothers Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="spouseBirthDateO">Birthdate of Spouse:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input id="spouseBirthDateO" name="spouseBirthDateO" type="text" class="form-control pull-right datepicker">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="occupationFatherO">Occupation:</label>
                                <input id="occupationFatherO" name="occupationFatherO" type="text" class="form-control" placeholder="Occupation">
                            </div>
                            <div class="form-group">
                                <label for="occupationMotherO">Occupation:</label>
                                <input id="occupationMotherO" name="occupationMotherO" type="text" class="form-control" placeholder="Occupation">
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contactPersonO">Contact Person</label>
                                <input id="contactPersonO" name="contactPersonO" type="text" class="form-control" placeholder="Contact Person In Case of Emergency">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="addressO">Address</label>
                                <input id="addressO" name="addressO" type="text" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contactNumberO">Contact Number</label>
                                <input id="contactNumberO" name="contactNumberO" type="text" class="form-control" placeholder="Contact Number">
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
                                <th>
                                    <div class="pull-right">
                                        <button type="button" class="btn btn-info" onclick="addItem()"><i class="fa fa-plus-circle"></i> Add Item</button>
                                    </div>
                                </th>
                                </thead>
                                <tbody id="childrens">
                                <tr>
                                    <td>
                                        <input type="text" placeholder="Name of Child" class="form-control">
                                    </td>
                                    <td>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right datepicker">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pull-right">
                                            <button style="display: none;" type="button" onclick="event.srcElement.parentElement.parentElement.parentElement.remove();rmv()" class='btn btn-danger'>Delete</button>
                                        </div>
                                    </td>

                                </tr>
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
    <div class="box-footer">
        <button type="button" class="btn btn-primary pull-right">Save changes</button>
    </div>
    </div>


@stop

@section('scripts')
    @parent

    <!-- DataTables -->
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function () {
            $('#driver').DataTable()
            $('#van').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            })
        })
    </script>

    <script src="{{ URL::asset('https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js') }}"></script>
    <script>
        var app = new Vue({
            el: '#root',
            data: {
                newName: '',
                names: ['Hello', 'World', 'randall', 'shaina']
            },

            methods: {
                addName() {
                    this.names.push(this.newName);
                    this.newName = '';
                }
            },
        });
    </script>

@stop