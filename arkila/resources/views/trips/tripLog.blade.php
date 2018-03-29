@extends('layouts.master')
@section('title', 'Trip Log')
@section('content-header', 'Trip Log')
@section('links')
@parent
<!-- additional CSS -->
<link rel="stylesheet" href="tripModal.css"> 

@stop
@section('content')

<div class="box">
    <!-- /.box-header -->
    <div class="box-body" style="box-shadow: 0px 5px 10px gray;">
        
        <table class="table table-bordered table-striped tripLog">
            <thead>
                <tr>
                    <th>Trip ID</th>
                    <th>Van</th>
                    <th>Driver</th>
                    <th>Departed at</th>
                    <th>Destination</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>PLS-124</td>
                    <td>Miguel</td>
                    <td>Baguio City</td>
                    <td>San Jose City</td>
                    <td>
                        <div class="text-center">
                            <button data-toggle="modal" data-target="#wala" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> VIEW</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>

@endsection

@section('scripts') 
@parent

<!-- DataTables -->
<script src="{{ URL::asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function() {
        $('.tripLog').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'order': [[ 0, "desc" ]],
            'aoColumnDefs': [
                { 'bSortable': false, 'aTargets': [-1]}
            ]
        })
    })
</script>

@endsection