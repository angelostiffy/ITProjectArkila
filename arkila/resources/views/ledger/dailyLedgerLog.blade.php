@extends('layouts.master')
@section('title', 'index')
@section('links')
@parent
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <!-- additional CSS -->
  <link rel="stylesheet" href="tripModal.css"> 

@stop
@section('content')

      <div id="ledgerInfo" class="box">
        <!-- /.box-header -->

        <div class="box-body">
          <table id="dailyLedgerTable" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Date</th>
              <th>Profit/Loss</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>May 23, 2018</td>
              <td>5200</td>
                <td class="center-block">
                    <div class="center-block">
                         <a button class="btn btn-info" href="dailyLedger.html" ><i class="glyphicon glyphicon-eye-open"> View </i></a>
                    </div>
                </td>

            </tr>

            </tbody>
          </table>


        </div>
        <!-- /.box-body -->
      </div>


<<<<<<< HEAD
@endsection

@section('scripts')
@parent
    <!-- DataTables -->
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}")></script>
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $('#example2').DataTable()
    $('#dailyLedgerTable').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>

@endsection
=======

@endsection
@scripts
@parent
    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
    $(function () {
      $('#example2').DataTable()
      $('#dailyLedgerTable').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : false,
        'autoWidth'   : true
      })
    })
    </script>
    
@stop
>>>>>>> bb839bfb85d93075c59b37f77f11289629c590e4
