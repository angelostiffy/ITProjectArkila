@extends('layouts.app')
@section('content')
  <div class="content-wrapper">
       <section class="content-header">
        <a href="driverList.html" class="btn btn-outline-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
    </section>
    <!-- Content Header (Page header) -->
    <section class="content-header">
                
                 <div class="box ">
                 <div class="box box-header">
                     <h3><strong>Edit Driver Information</strong></h3>
                 </div>
                <form id="f_1" action="#" onsubmit="return false;" class="form-horizontal">
                 <div class="box-body">
                    <div class="col-md-6">
                        <div  class="form-group">
                            <label for="driverId" class="control-label col-sm-4">Driver ID</label>
                            <div class="col-sm-8">
                            <input type="text" id="driverId" name="driverId" class="form-control">
                            </div>
                        </div>
                        <div  class="form-group">
                            <label for="operatorId" class="control-label col-sm-4">Operator ID</label>
                            <div class="col-sm-8">
                            <input type="text" id="operatorId" name="operatorId" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contactNumberD" class="control-label col-sm-4">Contact number</label>
                            <div class="col-sm-8">
                            <input type="text" id="contactNumberD" name="contactNumberD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="addressD" class="control-label col-sm-4">Address</label>
                            <div class="col-sm-8">
                            <input type="text" id="addressD" name="addressD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="provincialAddressD" class="control-label col-sm-4">Provincial address</label>
                            <div class="col-sm-8">
                            <input type="text" id="provincialAddressD" name="provincialAddressD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ageD" class="control-label col-sm-4">Age</label>
                            <div class="col-sm-8">
                            <input type="text" id="ageD" name="ageD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthDateD" class="control-label col-sm-4">Date of birth</label>
                            <div class="col-sm-8">
                            <input type="text" id="birthDateD" name="birthDateD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="birthPlaceD" class="control-label col-sm-4">Place of birth</label>
                            <div class="col-sm-8">
                            <input type="text" id="birthPlaceD" name="birthPlaceD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="personCasedOfEmergencyD" class="control-label col-sm-4">Contact person</label>
                            <div class="col-sm-8">
                            <input type="text" id="personCasedOfEmergencyD" name="personCasedOfEmergencyD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emergencyContactD" class="control-label col-sm-4">Emergency contact no.</label>
                            <div class="col-sm-8">
                            <input type="text" id="emergencyContactD" name="emergencyContactD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emergencyAddressD" class="control-label col-sm-4">Emergency address</label>
                            <div class="col-sm-8">
                            <input type="text" id="emergencyAddressD" name="emergencyAddressD" class="form-control">
                            </div>
                        </div>
                      </div>
                      
                      
                      <div class="col-md-6">
                        <div  class="form-group">
                            <label for="genderD" class="control-label col-sm-4">Gender</label>
                            <div class="col-sm-8">
                            <input type="text" id="genderD" name="genderD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="citizenshipD" class="control-label col-sm-4">Citizenship</label>
                            <div class="col-sm-8">
                            <input type="text" id="citizenshipD" name="citizenshipD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="civilStatusD" class="control-label col-sm-4">Civil status</label>
                            <div class="col-sm-8">
                            <input type="text" id="civilStatusD" name="civilStatusD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="numberOfChildrenD" class="control-label col-sm-4">Number of children</label>
                            <div class="col-sm-8">
                            <input type="text" id="numberOfChildrenD" name="numberOfChildrenD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="spouseD" class="control-label col-sm-4">Spouse</label>
                            <div class="col-sm-8">
                            <input type="text" id="spouseD" name="spouseD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="spouseBirthdateD" class="control-label col-sm-4">Spouse birthdate</label>
                            <div class="col-sm-8">
                            <input type="text" id="spouseBirthdateD" name="spouseBirthdateD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fatherNameD" class="control-label col-sm-4">Name of Father</label>
                            <div class="col-sm-8">
                            <input type="text" id="fatherNameD" name="fatherNameD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fatherOccupationD" class="control-label col-sm-4">Occupation of Father</label>
                            <div class="col-sm-8">
                            <input type="text" id="fatherOccupationD" name="fatherOccupationD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="motherNameD" class="control-label col-sm-4">Name of Mother</label>
                            <div class="col-sm-8">
                            <input type="text" id="motherNameD" name="motherNameD" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="motherOccupationD" class="control-label col-sm-4">Occupation of Mother</label>
                            <div class="col-sm-8">
                            <input type="text" id="motherOccupationD" name="motherOccupationD" class="form-control">
                            </div>
                        </div>   
                        <div class="form-group">
                            <label for="sssD" class="control-label col-sm-4">SSS number</label>
                            <div class="col-sm-8">
                            <input type="text" id="sssD" name="sssD" class="form-control">
                            </div>
                        </div>   
                      </div>
                        </div>
                    </div>
                     </form>
                    <div class="box-footer">
                <button type="button" class="btn btn-outline-primary pull-right">Save changes</button>
                    </div>
        </div>
        
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
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
@endsection