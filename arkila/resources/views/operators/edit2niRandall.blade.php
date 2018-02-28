@extends('layouts.master') @section('title', 'Edit Operator Information') @section('links') @parent
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"> @stop @section('content')
<div class="box box-warning">
    <div class="box-header with-border text-center">
        <a href="" class="pull-left btn btn-default"><i class="fa  fa-chevron-left"></i></a>
        <h3 class="box-title">
            Edit Operator Information
        </h3>
    </div>

    <form id="regForm" action="/action_page.php">
        <div class="box-body">

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
                                        <input type="radio" name="genderO" id="genderMaleO" value="male" class="flat-blue">
                                    </label>
                                <label for="genderFemaleO">Female</label>
                                <label class="radio-inline">
                                        <input type="radio" name="genderO" id="genderFemaleO" value="female" class="flat-blue">

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
                <div class="tab">
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
                <div class="tab">
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
                <div class="tab">
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
        </div>
    </form>
</div>


@stop @section('scripts') @parent

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
            iClone.cells[1].children[0].children[1].value = "";

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

@stop