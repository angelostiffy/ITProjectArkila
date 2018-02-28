@extends('layouts.master') @section('title', 'Edit Driver Information') @section('links') @parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}"> @stop @section('content')

<div class="box box-warning">
    <div class="box-header with-border text-center">
        <a href="" class="pull-left btn btn-default"><i class="fa  fa-chevron-left"></i></a>
        <h3 class="box-title">
            Edit Driver Information
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
                            <input id="driverLastName" name="driverLastName" type="text" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="contactNumberD">Contact Number:</label>
                            <input id="contactNumberD" name="contactNumberD" type="text" class="form-control" placeholder="Contact Number">
                        </div>
                        <div class="form-group">
                            <label for="ageD">Age:</label>
                            <input id="ageD" name="ageD" type="number" class="form-control" placeholder="Age">
                        </div>
                        <div class="form-group">
                            <label for="genderD">Gender:</label>
                            <div class="radio">
                                <label for="genderMaleD"> Male</label>
                                <label class="radio-inline">
                        <input type="radio" name="genderD" id="genderMaleD" value="male" class="flat-blue">
                        </label>
                                <label for="genderMaleF">Female</label>
                                <label class="radio-inline">
                        <input type="radio" name="genderD" id="genderMaleF" value="female" class="flat-blue">
                          
                        </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sssD">SSS No:</label>
                            <input id="sssD" name="sssD" type="text" class="form-control" placeholder="SSS No.">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="driverFirstName">First Name:</label>
                            <input id="driverFirstName" name="driverFirstName" type="text" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="addressD">Address:</label>
                            <input id="addressD" name="addressD" type="text" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="birthdateD">Birthdate:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input id="birthdateD" name="birthdateD" type="text" class="form-control pull-right datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="citizenshipD">Citizenship:</label>
                            <input id="citizenshipD" name="citizenshipD" type="text" class="form-control" placeholder="Citizenship">
                        </div>
                        <div class="form-group">
                            <label for="licenseNoD">License No:</label>
                            <input id="licenseNoD" name="licenseNoD" type="text" class="form-control" placeholder="License No.">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="driverMiddleName">Middle Name:</label>
                            <input id="driverMiddleName" name="driverMiddleName" type="text" class="form-control" placeholder="Middle Name">
                        </div>
                        <div class="form-group">
                            <label for="provincialAddressD">Provincial Address:</label>
                            <input id="provincialAddressD" name="provincialAddressD" type="text" class="form-control" placeholder="Provincial Address">
                        </div>
                        <div class="form-group">
                            <label for="birthplaceD">Birthplace:</label>
                            <input id="birthplaceD" name="birthplaceD" type="text" class="form-control" placeholder="Birthplace">
                        </div>
                        <div class="form-group">
                            <label for="civilStatusD">Civil Status:</label>
                            <select id="civilStatusD" name="civilStatusD" class="form-control">
                       <option>Single</option>
                       <option>Married</option>
                       <option>Divorced</option>
                       <option>Widowed</option>
                   </select>
                        </div>
                        <div class="form-group">
                            <label for="licenseExpiryDateD">License Expiry Date:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input id="licenseExpiryDateD" name="licenseExpiryDateD" type="text" class="form-control pull-right datepicker">
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
                            <label for="spouseNameD">Name of Spouse:</label>
                            <input id="spouseNameD" name="spouseNameD" type="text" class="form-control" placeholder="Name of Spouse">
                        </div>
                        <div class="form-group">
                            <label for="fathersNameD">Fathers Name:</label>
                            <input id="fathersNameD" name="fathersNameD" type="text" class="form-control" placeholder="Fathers Name">
                        </div>
                        <div class="form-group">
                            <label for="mothersNameD">Mothers Name:</label>
                            <input id="mothersNameD" name="mothersNameD" type="number" class="form-control" placeholder="Mothers Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="spouseBirthDateD">Birthdate of Spouse:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input id="spouseBirthDateD" name="spouseBirthDateD" type="text" class="form-control pull-right datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="occupationFatherD">Occupation:</label>
                            <input id="occupationFatherD" name="occupationFatherD" type="text" class="form-control" placeholder="Occupation">
                        </div>
                        <div class="form-group">
                            <label for="occupationMotherD">Occupation:</label>
                            <input id="occupationMotherD" name="occupationMotherD" type="text" class="form-control" placeholder="Occupation">
                        </div>

                    </div>

                </div>
                <div class="tab">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="contactPersonD">Contact Person</label>
                            <input id="contactPersonD" name="contactPersonD" type="text" class="form-control" placeholder="Contact Person In Case of Emergency">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="addressD">Address</label>
                            <input id="addressD" name="addressD" type="text" class="form-control" placeholder="Address">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="contactNumberD">Contact Number</label>
                            <input id="contactNumberD" name="contactNumberD" type="text" class="form-control" placeholder="Contact Number">
                        </div>
                    </div>
                </div>
                <div class="tab">
                    <div class="col-md-12">
                        <Label for="dependentsD">Dependents:</Label>
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