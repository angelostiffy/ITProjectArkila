@extends('vans.master')
@section('table')
  <div class="content-wrapper">
       <section class="content-header">
        <a href="vanList.html" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
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
                      </div>
                        </div>
                    </div>
                     </form>
                    <div class="box-footer">
                <button type="button" class="btn btn-primary pull-right">Save changes</button>
                    </div>
        </div>
        </div>
    </section>


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