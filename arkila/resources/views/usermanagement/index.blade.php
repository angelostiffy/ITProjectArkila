@extends('layouts.master')
@section('title', 'User Management')
@section('content-header', 'User Management')
@section('links')
@parent
<!-- additional CSS -->
<link rel="stylesheet" href="tripModal.css"> 

@stop
@section('content')
<div class="box">

    <div class="box-body" style="box-shadow: 0px 5px 10px gray;">
        <div class="col-xl-6">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li class="active"><a href="#tab_1" data-toggle="tab">Admin</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Driver</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Customer</a></li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                            <div class="box-body">
                                <div class="table-responsive">
                                <div class="col col-md-6">
                                    <a href="/home/user-management/admin/create" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i>  Create New</a>
                                </div>


                                <table id="adminTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Terminal</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($userAdmins as $userAdmin)
                                        <tr>
                                            <td>{{$userAdmin->name}}</td>
                                            <td>{{$userAdmin->username}}</td>
                                            <td>{{$userAdmin->description}}</td>
                                            <td class="center-block">
                                                <div class="text-center">
                                                    <a href="/home/user-management/admin/{{$userAdmin->userid}}/edit" class="btn btn-default btn-sm btn-flat"><i class="glyphicon glyphicon-cog"></i>Manage Account</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>

                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        
                        
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="driverTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Username</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userDrivers as $userDriver)
                                    <tr>
                                        <td>{{$userDriver->name}}</td>
                                        <td>{{$userDriver->username}}</td>

                                        <td class="center-block">
                                            <div class="text-center">
                                                <a href="/home/user-management/admin/{{$userDriver->userid}}/edit" class="btn btn-default"><i class="glyphicon glyphicon-cog"></i>Manage Account</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane" id="tab_3">
                        <div class="box-body">
                            <div class="table-responsive">
                            <table id="customerTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($userCustomers as $userCustomer)
                                    <tr>
                                        <td>{{$userCustomer->name}}</td>
                                        <td>{{$userCustomer->username}}</td>
                                        <td>{{$userCustomer->email}}</td>
                                        <td class="center-block">
                                            <div class="text-center">
                                                <a href="/home/user-management/admin/{{$userCustomer->userid}}/edit" class="btn btn-default"><i class="glyphicon glyphicon-cog"></i>Manage Account</a>
                                            </div>
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>


                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
</div>
@endsection

@section('scripts')
@parent

    <script>
        $(function() {
            $('#adminTable').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            })

            $('#driverTable').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            })

            $('#customerTable').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            })
        });
    </script>

@endsection