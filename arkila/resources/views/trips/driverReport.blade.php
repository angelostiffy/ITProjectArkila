@extends('layouts.master')
@section('title', 'Driver Report')
@section('content-header', 'Driver Report')
@section('links')
@parent
<!-- additional CSS -->
<link rel="stylesheet" href="tripModal.css"> 

@stop
@section('content')


<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
        <table id="driversTrips" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Trip ID</th>
                    <th>Van</th>
                    <th>Driver</th>
                    <th>Departed at</th>
                    <th>Destination</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>NGR-123</td>
                    <td>JL</td>
                    <td>Cabanatuan</td>
                    <td>Baguio City</td>
                    <th>Pending</th>
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
</div>

@endsection

@section('scripts')
@parent

<script>
    $(function() {
        $('#driversTrips').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            'order': [
                [0, "desc"]
            ],
            'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [-1]
            }]
        })
    });
</script>

@endsection