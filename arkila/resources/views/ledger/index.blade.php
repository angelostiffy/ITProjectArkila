@extends('layouts.master')
@section('title', 'Daily Ledger Log')
@section('links')
@parent
  <link rel="stylesheet" href="tripModal.css"> 
@stop
@section('content')
<div id="ledgerInfo" class="box">
    <!-- /.box-header -->

    <div class="box-body">
    <a button class="btn btn-info" href="{{route('ledger.create')}}"><i class="glyphicon glyphicon-eye-open"> Add </i></a>

        <table class="table table-bordered table-striped dailyLedgerTable">
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
                            <a button class="btn btn-info" href="show"><i class="glyphicon glyphicon-eye-open"> View </i></a>
                        </div>
                    </td>

                </tr>

            </tbody>
        </table>


    </div>
    <!-- /.box-body -->
</div>

@endsection

@section('scripts')
@parent

    <script>  
        $(function() {
            $('.dailyLedgerTable').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true
            })
    
        })
    </script>

@endsection
