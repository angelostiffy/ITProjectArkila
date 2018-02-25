@extends('layouts.master') @section('title', 'index') @section('links') @parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- additional CSS -->
<link rel="stylesheet" href="operatorStyle.css"> @stop @section('content')

<a href="operatorProfile.html" class="btn btn-outline-primary"><i class="fa fa-arrow-circle-left"></i> Back</a>
<div class="box ">
    <div class="box box-header">
        <h3><strong>View Van Information</strong></h3>
    </div>
    <a href="" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Edit</a>
    <form id="f_1" action="#" onsubmit="return false;" class="form-horizontal">
        <div class="box-body">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="plateNo" class="control-label col-sm-4">Plate Number</label>
                    <div class="col-sm-4">
                        <p id="plateNo" name="plateNo" class="control-label pull-right"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="driverName" class="control-label col-sm-4">Driver Name</label>
                    <div class="col-sm-4">
                        <p id="driverName" name="driverName" class="control-label pull-right"></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="genderD" class="control-label col-sm-4">Model</label>
                    <div class="col-sm-4">
                        <p id="genderD" name="genderD" class="control-label pull-right"></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="citizenshipD" class="control-label col-sm-4">Seating Capacity</label>
                    <div class="col-sm-4">
                        <p id="citizenshipD" name="citizenshipD" class="control-label pull-right"></p>
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