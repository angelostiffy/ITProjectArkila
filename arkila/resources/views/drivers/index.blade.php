@extends('layouts.master') @section('title', 'Driver List') @section('content-header', 'Driver List') @section('content')
<div class="box">
    <div class="box-body">
        <a href="{{route('drivers.create')}}" class="btn btn-primary">Add Driver <i class="fa fa-plus-circle"></i></a>
        <table id="driverList" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Driver ID</th>
                    <th>Operator ID</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($drivers as $driver)
                <tr>
                    <th>{{$driver->member_id}}</th>
                    <td>{{$driver->operator_id}}</td>
                    <td>{{$driver->full_name}}</td>
                    <td>{{$driver->contact_number}}</td>
                    <td>{{$driver->address}}</td>
                    <td>{{$driver->age}}</td>
                    <td>
                        <form action="{{route('drivers.destroy',[$driver->member_id])}}" method="POST">
                                {{csrf_field()}} {{method_field("DELETE")}}
                        <div class="text-center">
                            <a href="{{route('drivers.edit',[$driver->member_id])}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>Edit</a>
                            <a href="{{route('drivers.show',[$driver->member_id])}}" class="btn btn-default"><i class="fa fa-eye"></i>View</a>  
                            
                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                            
                        </div>
                            </form>
                        <!-- /.text-->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box-->
@stop @section('scripts') @parent

<script>
    $(function() {
        $('#driverList').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })
</script>

@stop