@extends('layouts.master')
@section('title', 'Driver's Report')
@section('content-header', 'Driver's Report')
@section('links')
@parent
<!-- additional CSS -->
<link rel="stylesheet" href="tripModal.css"> 

@stop
@section('content')


<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <table id="driversTrips" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Trip ID</th>
                    <th>Van</th>
                    <th>Driver</th>
                    <th>Departed at</th>
                    <th>Destination</th>
                    <th>Status</th>
                    <th>Action</th>
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
                    <td class="center-block">
                        <div class="center-block">
                            <button class="btn btn-success"><i class="fa fa-check"></i> Accept</button>
                            <button class="btn btn-danger"><i class="fa fa-close"></i> Decline</button>
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

    <script>
        $(function() {
            $('#driverTrips').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true
            })
        });
    </script>

@endsection