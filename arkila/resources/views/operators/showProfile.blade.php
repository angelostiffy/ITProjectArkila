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
     <section class="content">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $operator->full_name }}</h3>                                          
                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>ID</b> <a class="pull-right">{{ $operator->member_id }}</a>
                </li>
                <li class="list-group-item">
                  <b>Contact Number</b> <a class="pull-right">{{ $operator->contact_number }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <a href="{{route('operators.edit',[$operator->member_id])}}" class="btn btn-block btn-info"><b>Edit Information</b></a>
                <a href="{{route('operators.show',[$operator->member_id])}}" class="btn btn-primary btn-block"><b>View All Information</b></a>
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog" style="width:400px;">
            <div class="modal-content">
              <div class="modal-header bg-primary" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ $operator->full_name }}</h4>
              </div>
              <div class="modal-body">
                  <div class="container-fluid">
          <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Choose Driver</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body center-block">
              <div class="form-group ">
                <select class="form-control">
                  <option selected="selected">Shaina</option>
                  <option>Marie</option>
                  <option>Retuya</option>
                  <option>Ganda</option>
                </select>
              </div>
            <!-- /.col -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
                <button type="submit" name="search" id="search-btn" class="btn btn-primary pull-right"> Submit </button>
        </div>
      </div>
                  </div>       
                </div>
                
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
                
            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#drivers" data-toggle="tab">Drivers</a></li>
              <li><a href="#vans" data-toggle="tab">Vans</a></li>
            </ul>
            <div class="tab-content">
        <div class="active tab-pane" id="drivers">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <a href="{{route('drivers.createFromOperator',[$operator->member_id])}}" class="btn btn-success" style="margin-bottom:-5%;"><i class="fa fa-plus-circle"></i> Add Driver</a>
              <table id="driver" class="table table-bordered table-striped">
               
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Contact Number</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                  @foreach($operator->drivers as $driver)
                    <tr>
                      <td>{{$driver->full_name}}</td>
                      <td>{{$driver->age}}</td>
                      <td>{{$driver->contact_number}}</td>
                      <td>
                        <div class="text-center">
                          <a href="{{route('drivers.show',[$driver->member_id])}}" class="btn btn-primary"><i class="fa fa-eye"></i>View</a>
                          <a href="{{route('drivers.edit',[$driver->member_id])}}" class="btn btn-info"><i class="fa fa-pencil-square-o"></i>Edit</a>
                          <form action="{{route('drivers.destroy',[$driver->member_id])}}" method="POST">
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
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
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="vans">
          <div class="box">
            <div class="box-header">
                <button class="btn btn-success" style="margin-bottom:-8%;"><i class="fa fa-plus-circle"></i> Add Van</button>
            </div>
            <div class="box-body">
              <table id="van" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Plate Number</th>
                  <th>Driver</th>
                  <th>Contact Number</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($operator->van as $van)
                <tr>
                  <td>{{$van->plate_number}}</td>
                  <td>{{$van->driver_name}}</td>
                    <td>{{$van->contact_number}}</td>
                  <td>
                    <div class="text-center">
                        <a href="changeDriver.html" class="btn btn-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-eye"></i> Change Driver</a>
                        <a href="viewVanOperator.html" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>View</a>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</i></button>
                    </div>
                  </td>
                </tr>
                @endforeach

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
              </div>
              <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
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
        $('#driver').DataTable({
          'paging'      : false,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
        })
        $('#van').DataTable({
          'paging'      : false,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true
        })
      })
    </script>
    
@stop