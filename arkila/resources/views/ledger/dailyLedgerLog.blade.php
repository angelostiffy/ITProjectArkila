@extends('layouts.master')
@section('title', 'index')
@section('content')

<section class="content">
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
</section>

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