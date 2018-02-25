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
                
            <a href="{{route('operators.showProfile',[$operator->member_id])}}" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
                 <div class="box ">
                    <div class="box box-header">
                        <h3><strong>Edit Operator Information</strong></h3>
                    </div>

                    <form action="" class="form-horizontal">
                        <div class="box-body">

                            <div class="box box-header">
                                <h4>Personal Information</h4>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="operatorName" class="control-label col-sm-4">Operator Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="operatorName" name="operatorName" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ageO" class="control-label col-sm-4">Age</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="ageO" name="ageO" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birthDateO" class="control-label col-sm-4">Date of birth</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="birthDateO" name="birthDateO" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label col-sm-4">Place of birth</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="" name="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">


                                <div class="form-group">
                                    <label for="contactNumberO" class="control-label col-sm-4">Contact number</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="contactNumberO" name="contactNumberO" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="addressO" class="control-label col-sm-4">Address</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="addressO" name="addressO" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="provincialAddressO" class="control-label col-sm-4">Provincial address</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="provincialAddressO" name="provincialAddressO" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="sssO" class="control-label col-sm-4">SSS number</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="sssO" name="sssO" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="genderO" class="control-label col-sm-4">Gender</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="genderO" name="genderO" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="citizenshipO" class="control-label col-sm-4">Citizenship</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="citizenshipO" name="citizenshipO" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="civilStatusO" class="control-label col-sm-4">Civil status</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="civilStatusO" name="civilStatusO" class="form-control">
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
                                    <label for="fatherNameO" class="control-label col-sm-4">Name of Father</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="fatherNameO" name="fatherNameO" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fatherOccupationO" class="control-label col-sm-4">Occupation of Father</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="fatherOccupationO" name="fatherOccupationO" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="motherNameO" class="control-label col-sm-4">Name of Mother</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="motherNameO" name="motherNameO" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="motherOccupationO" class="control-label col-sm-4">Occupation of Mother</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="motherOccupationO" name="motherOccupationO" class="form-control">
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="personCasedOfEmergencyO" class="control-label col-sm-4">Contact person</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="personCasedOfEmergencyO" name="personCasedOfEmergencyO" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emergencyContactO" class="control-label col-sm-4">Emergency contact no.</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="emergencyContactO" name="emergencyContactO" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="emergencyAddressO" class="control-label col-sm-4">Emergency address</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="emergencyAddressO" name="emergencyAddressO" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="spouseO" class="control-label col-sm-4">Spouse</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="spouseO" name="spouseO" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="spouseBirthdateO" class="control-label col-sm-4">Spouse birthdate</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="spouseBirthdateO" name="spouseBirthdateO" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="numberOfChildrenO" class="control-label col-sm-4">Number of children</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="numberOfChildrenO" name="numberOfChildrenO" class="form-control">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="namesOfChildrenO" class="control-label col-sm-4">Names of children</label>
                                    <div id="root" class="col-sm-4">

                                        <li v-for="name in names" v-text="name"></li>

                                        <input id="input" type="text" v-model="newName">
                                        <button type="button" class="btn btn-primary" @click="addName">add</button>
                                    </div>
                                </div>




                            </div>
                        </div>
                </div>
                    <div class="box-footer">
                <button type="button" class="btn btn-primary pull-right">Save changes</button>
                    </div>
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