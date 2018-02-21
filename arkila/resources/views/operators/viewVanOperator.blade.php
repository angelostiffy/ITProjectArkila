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
       
        <a href="operatorProfile.html" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>             
                 <div class="box ">
                 <div class="box box-header">
                     <h3><strong>View Van Information</strong></h3>
                 </div>
                <form id="f_1" action="#" onsubmit="return false;" class="form-horizontal">
                 <div class="box-body">
                    <div class="col-md-6">
                        <div  class="form-group">
                            <label for="driverId" class="control-label col-sm-4">Plate Number</label>
                            <div class="col-sm-8">
                            <input type="text" id="driverId" name="driverId" class="form-control" disabled>
                            </div>
                        </div>
                        <div  class="form-group">
                            <label for="driverId" class="control-label col-sm-4">Driver ID</label>
                            <div class="col-sm-8">
                            <input type="text" id="driverId" name="driverId" class="form-control" disabled>
                            </div>
                        </div>
                        </div>
                      
                      
                      <div class="col-md-6">
                        <div  class="form-group">
                            <label for="genderD" class="control-label col-sm-4">Model</label>
                            <div class="col-sm-8">
                            <input type="text" id="genderD" name="genderD" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="citizenshipD" class="control-label col-sm-4">Seating Capacity</label>
                            <div class="col-sm-8">
                            <input type="text" id="citizenshipD" name="citizenshipD" class="form-control" disabled>
                            </div>
                        </div>
                        </div> 
                        
                      </div>  
                      </div>
                        </div>
                    </div>
                     </form>
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
    
@stop