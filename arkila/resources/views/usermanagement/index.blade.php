@extends('layouts.master')
@section('title', 'User Management')
@section('links')
@parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- additional CSS -->
<link rel="stylesheet" href="tripModal.css"> 

@stop
@section('content')

<section class="content">
    <div class="box">
        
        <div class="box-body">
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

                <div class="center-block">
                <a href="/home/user-management/admin/create" button class="btn btn-primary" style="margin-bottom: 2%;"><i class="glyphicon glyphicon-plus">Add </i></a>

                </div>    

                <table id="adminTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>    
                    <th>Terminal</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($userAdmins as $userAdmin)
                <tr>
                    <td>{{$userAdmin->name}}</td>  
                    <td>{{$userAdmin->username}}</td>      
                    <td>{{$userAdmin->description}}</td>
                    <td class="center-block">
                    <div class="center-block">
                         <a href="/home/user-management/admin/{{$userAdmin->userid}}" class="btn btn-default"><i class="glyphicon glyphicon-cog"></i></a>

                    </div>
                    </td>
                </tr>
                @endforeach
            </table>
            </div>


            </div>

            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">

            <div class="box-body">

                <table id="driverTable" class="table table-bordered table-striped">
                    <thead>
                    <tr>

                    <th>Name</th>
                    <th>Username</th>     
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userDrivers as $userDriver)    
                    <tr>
                    <td>{{$userDriver->name}}</td>
                    <td>{{$userDriver->username}}</td>
                    
                    <td class="center-block">
                    <div class="center-block">
                        <button class="btn btn-default"><i class="glyphicon glyphicon-cog">View</i></button>

                    </div>
                    </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            </div>


            <div class="tab-pane" id="tab_3">
            <div class="box-body">   
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
                    <div class="center-block">
                         <button class="btn btn-default"><i class="glyphicon glyphicon-cog"></i></button>

                    </div>
                </td>
                @endforeach
                </tr>
                </table>
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
</section>
@endsection

@section('scripts')
@parent
    <!-- DataTables -->
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}")></script>
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
            
<script>
    $(function() {
        $('.example1').DataTable()
        $('#adminTable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
        
        $('#driverTable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
        
        $('#customerTable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })
</script>

@endsection