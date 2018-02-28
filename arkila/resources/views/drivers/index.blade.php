@extends('layouts.master') @section('title', 'Driver List') 
@section('content-header', 'Driver List')
        
@section('content')
    <section class="content">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
             <button href="{{route('drivers.create')}}" class="btn btn-success">Add Driver <i class="fa fa-plus-circle"></i></button>
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

                    <tr>
                        <th>pugss</th>
                        <td>pug</td>
                        <td>Chabal loves shaina</td>
                        <td>0998273</td>
                        <td>badihoy</td>
                        <td>15</td>
                        <td>
                            <div class="text-center">
                                <a href="viewDriver.html" class="btn btn-outline-info"><i class="fa fa-eye"></i>View</a>
                                <a href="editDriver.html" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>Edit</a>
                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</i></button>
                            </div>
                        </td>
                    </tr>

                @foreach($drivers as $driver)
                <tr>
                  <th>{{$driver->member_id}}</th>
                  <td>{{$driver->operator_id}}</td>
                  <td>{{$driver->full_name}}</td>
                  <td>{{$driver->contact_number}}</td>
                  <td>{{$driver->address}}</td>
                  <td>{{$driver->age}}</td>
                  <td>
                    <div class="text-center">
                        <a href="{{route('drivers.show',[$driver->member_id])}}" class="btn btn-primary"><i class="fa fa-eye"></i>View</a>
                        <a href="{{route('drivers.edit',[$driver->member_id])}}" class="btn btn-info"><i class="fa fa-pencil-square-o"></i>Edit</a>
                        <form action="{{route('drivers.destroy',[$driver->member_id])}}" method="POST">
                            {{csrf_field()}}
                            {{method_field("DELETE")}}
                        <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</i></button>
                        </form>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
</section>
@stop @section('scripts') @parent

<script>
    $(function() {
        $('#example2').DataTable()
        $('#driverList').DataTable({
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