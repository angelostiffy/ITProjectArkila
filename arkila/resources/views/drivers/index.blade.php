@extends('layouts.master')
@section('title', 'Driver List')
@section('links')
@parent
  <!-- DataTables -->
  <link rel= "stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- additional CSS -->
  <link rel="stylesheet" href="operatorStyle.css"> 

@stop
@section('content-header', 'Driver List')
        
@section('content')
   <a href="{{route('drivers.create')}}" class="btn btn-success">Add Driver <i class="fa fa-plus-circle"></i></a>
    <section class="content">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
             <button href="{{route('drivers.create')}}" class="btn btn-success">Add Driver <i class="fa fa-plus-circle"></i></button>
              <table id="example1" class="table table-bordered table-striped">
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
@stop

@section('scripts')
@parent

    <!-- DataTables -->
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
      $(function () {
        $('#example2').DataTable()
        $('#example1').DataTable({
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