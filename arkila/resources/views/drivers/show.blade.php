@extends('layouts.master') @section('title', 'View Driver') @section('links') @parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- additional CSS -->
<link rel="stylesheet" href="operatorStyle.css"> @stop @section('content')

<a href="@if(session()->get('opLink') && session()->get('opLink') == URL::previous()) {{session()->get('opLink')}} @else {{ route('drivers.index') }} @endif" class="btn btn-outline-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>

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
                                            <p id="driverLastName" name="driverLastName" type="text" class="form-control" placeholder="Last Name">{{$driver->last_name}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="contactNumberD">Contact Number:</label>
                                            <p id="contactNumberD" name="contactNumberD" type="text" class="form-control" placeholder="Contact Number">{{$driver->contact_number}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="ageD">Age:</label>
                                            <p id="ageD" name="ageD" type="number" class="form-control" placeholder="Age">{{$driver->age}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="genderD">Gender:</label>
                                            {{$driver->gender}}
                                        </div>
                                        <div class="form-group">
                                            <label for="sssD">SSS No:</label>
                                            <p id="sssD" name="sssD" type="text" class="form-control" placeholder="SSS No.">{{$driver->SSS}}</p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="driverFirstName">First Name:</label>
                                            <p id="driverFirstName" name="driverFirstName" type="text" class="form-control" placeholder="First Name">{{$driver->first_name}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="addressD">Address:</label>
                                            <p id="addressD" name="addressD" type="text" class="form-control" placeholder="Address">{{$driver->address}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthdateD">Birthdate:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <p id="birthdateD" name="birthdateD" type="text" class="form-control pull-right datepicker">{{$driver->birth_date}}</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="citizenshipD">Citizenship:</label>
                                            <p id="citizenshipD" name="citizenshipD" type="text" class="form-control" placeholder="Citizenship">{{$driver->citizenship}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="licenseNoD">License No:</label>
                                            <p id="licenseNoD" name="licenseNoD" type="text" class="form-control" placeholder="License No.">{{$driver->license_number}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="driverMiddleName">Middle Name:</label>
                                            <p id="driverMiddleName" name="driverMiddleName" type="text" class="form-control" placeholder="Middle Name">{{$driver->middle_name}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="provincialAddressD">Provincial Address:</label>
                                            <p id="provincialAddressD" name="provincialAddressD" type="text" class="form-control" placeholder="Provincial Address">{{$driver->provincial_address}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthplaceD">Birthplace:</label>
                                            <p id="birthplaceD" name="birthplaceD" type="text" class="form-control" placeholder="Birthplace">{{$driver->birth_place}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="civilStatusD">Civil Status:</label>
                                            {{$driver->civil_status}}
                                        </div>
                                        <div class="form-group">
                                            <label for="licenseExpiryDateD">License Expiry Date:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <p id="licenseExpiryDateD" name="licenseExpiryDateD" type="text" class="form-control pull-right datepicker">{{$driver->expiry_date}}</p>
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
                                            <label for="spouseNameD">Name of Spouse:</label>
                                            <p id="spouseNameD" name="spouseNameD" type="text" class="form-control" placeholder="Name of Spouse">{{$driver->spouse}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="fathersNameD">Fathers Name:</label>
                                            <p id="fathersNameD" name="fathersNameD" type="text" class="form-control" placeholder="Fathers Name">{{$driver->father_name}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="mothersNameD">Mothers Name:</label>
                                            <p id="mothersNameD" name="mothersNameD" type="number" class="form-control" placeholder="Mothers Name">{{$driver->mother_name}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="spouseBirthDateD">Birthdate of Spouse:</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <p id="spouseBirthDateD" name="spouseBirthDateD" type="text" class="form-control pull-right datepicker">{{$driver->spouse_birth_date}}</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="occupationFatherD">Occupation:</label>
                                            <p id="occupationFatherD" name="occupationFatherD" type="text" class="form-control" placeholder="Occupation">{{$driver->father_occupation}}</p>
                                        </div>
                                        <div class="form-group">
                                            <label for="occupationMotherD">Occupation:</label>
                                            <p id="occupationMotherD" name="occupationMotherD" type="text" class="form-control" placeholder="Occupation">{{$driver->mother_occupation}}</p>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contactPersonD">Contact Person</label>
                                            <p id="contactPersonD" name="contactPersonD" type="text" class="form-control" placeholder="Contact Person In Case of Emergency">{{$driver->person_in_case_of_emergency}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="addressD">Address</label>
                                            <p id="addressD" name="addressD" type="text" class="form-control" placeholder="Address">{{$driver->emergency_address}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contactNumberD">Contact Number</label>
                                            <p id="contactNumberD" name="contactNumberD" type="text" class="form-control" placeholder="Contact Number">{{$driver->emergency_contactno}}</p>
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
                                            @if($driver->children)
                                                @foreach($driver->children as $child)
                                                <tr>
                                                    <td>
                                                        <p type="text" placeholder="Name of Child" class="form-control">{{$child->full_name}}</p>
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