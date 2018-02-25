@extends('layouts.master')
@section('title', 'index')
@section('links')
@parent
  <!-- DataTables -->
  <link rel= "stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- additional CSS -->
  <link rel="stylesheet" href="operatorStyle.css"> 

@stop
@section('content')
          <div class="box">
            <!-- /.box-header -->
            <div class="box-header">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">My Operators</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <a href="/home/operators/create" class="btn btn-sm btn-primary btn-create">Create New</a>
                  </div>
                </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Contact Number</th>
                  <th>Address</th>
                  <th>Age</th>
                  <th>Actions</th>
                </tr>
                </thead>
                
                  <tbody>
                  @foreach ($operators as $operator)
                          <tr>
                            <td class="hidden-xs" name="opId">{{ $operator->member_id }}</td>
                            <td><a href="operators/{{ $operator->member_id }}">{{ $operator->first_name }} {{ $operator->middle_name }} {{ $operator->last_name }}</a></td>
                            <td>{{ $operator->contact_number }}</td>
                            <td>{{ $operator->address }}</td>
                            <td>{{ $operator->age }}</td>
                            <td>
                    
                    <div class="text-center">
                              
                                <form action="{{ route('operators.destroy', [$operator->member_id]) }}" method="POST" >
                                 {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                  <a href="/home/operators/{{ $operator->member_id }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                 <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</i></button>
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