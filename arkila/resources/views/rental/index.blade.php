@extends('layouts.master')
@section('title', 'Rental List')
@section('content-header', 'Rental List')
@section('links')
@parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- additional CSS -->
<link rel="stylesheet" href="tripModal.css"> 

@stop
@section('content')
<a href="/home/rental/create" class="btn btn-sm btn-primary btn-create">Create New</a>
<section class="content">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Destination</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Contact No.</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rentals as $rental)
                <tr>
                  <td>{{ $rental->full_name }}</td>
                  <td>Dagupan, Pangasinan</td>
                  <td>02-17-2018</td>
                  <td>8:00 AM</td>
                  <td>09966581956</td>
                  <td>Declined</td>
                  <td>
                    <div class="text-center">
                        <a href="operatorProfile.html" class="btn btn-success "><i class="fa fa-automobile"></i> Depart</a>
                        <button class="btn btn-danger"><i class="fa fa-close"></i> Decline</button>
                        <button class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>

                    </div>
                  </td>
                </tr>
                @endforeach
                <!-- <tr>
                  <td>Randall Caballar</td>
                  <td>San Juan, La Union</td>
                  <td>03-20-2018</td>
                  <td>1:00 PM</td>
                  <td>09164562817</td>
                  <td>Approved</td>
                  <td>
                    <div class="text-center">
                        <button class="btn btn-success "><i class="fa fa-automobile"></i> Depart</button>
                        <button class="btn btn-danger"><i class="fa fa-close"></i> Decline</button>
                        <button class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Dixon Viloria</td>
                  <td>Vigan, Ilocos Sur</td>
                  <td>03-02-2018</td>
                  <td>10:00 AM</td>
                  <td>09154567268</td>
                  <td>Pending</td>
                  <td>
                    <div class="text-center">
                        <button class="btn btn-success	 "><i class="fa fa-automobile"></i> Depart</button>
                        <button class="btn btn-danger"><i class="fa fa-close"></i> Decline</button>
                        <button class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </td>
                </tr> -->
                
         
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>

@endsection
@section('scripts')
@parent

    <!-- DataTables -->
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}")></script>
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
            
<script>

$(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection