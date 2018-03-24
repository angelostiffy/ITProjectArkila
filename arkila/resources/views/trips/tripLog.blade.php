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
    <div class="box-body">
        <table id="triplog" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Trip ID</th>
                    <th>Van</th>
                    <th>Driver</th>
                    <th>Departed at</th>
                    <th>Destination</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>PLS-124</td>
                    <td>Miguel</td>
                    <td>Baguio City</td>
                    <td>San Jose City</td>
                    <td class="center-block">
                        <div class="center-block">
                            <button class="btn btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"> View </i></button>
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
            $('#tripLog').DataTable({
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