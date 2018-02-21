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

              <h3 class="profile-username text-center">Shaina Caballar</h3>

              <p class="text-muted text-center">ganda</p>
                              
                
                <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>ID</b> <a class="pull-right">215</a>
                </li>
                <li class="list-group-item">
                  <b>Contact Number</b> <a class="pull-right">1334287</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
                <a href="editOperator.html" class="btn btn-block btn-info"><b>Edit Information</b></a>
                <a href="viewOperator.html" class="btn btn-primary btn-block"><b>View All Information</b></a>
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog" style="width:400px;">
            <div class="modal-content">
              <div class="modal-header bg-primary" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Shaina Caballar</h4>
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
                <button class="btn btn-success" style="margin-bottom:-5%;"><i class="fa fa-plus-circle"></i> Add Driver</button>
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
                <tr>
                  <td>puggggg</td>
                  <td>Chabal loves shaina</td>
                  <td>15</td>
                  <td>
                    <div class="text-center">
                        <a href="viewDriverOperator.html" class="btn btn-primary"><i class="fa fa-eye"></i>View</a>
                        <a href="editDriverOperator.html" class="btn btn-info"><i class="fa fa-pencil-square-o"></i>Edit</a>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</i></button>
                    </div>
                  </td>
                </tr>
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
                <tr>
                  <th>pug</th>
                  <td>Chabal loves shaina</td>
                    <td>0998273</td>
                  <td>
                    <div class="text-center">
                        <a href="changeDriver.html" class="btn btn-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-eye"></i> Change Driver</a>
                        <a href="viewVanOperator.html" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>View</a>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</i></button>
                    </div>
                  </td>
                </tr>
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