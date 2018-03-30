@extends('layouts.master')
@section('title', 'Daily Ledger')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
@stop
@section('content')

<div id="ledgerInfo" class="box">
    <!-- /.box-header -->
    <h2 class="text-center">March 23, 2018</h2>
    
    <div class="col col-md-6">
        <a href="{{route('ledger.create')}}" class="btn btn-primary btn-flat btn-sm" data-target="#addExpRev">
            Add <span class="glyphicon glyphicon-plus-sign"></span> 
        </a>
    </div>

    <div class="box-body">
        <table class="table table-bordered table-striped dailyLedgerTable">
            <thead>
                <tr>
                    <th>Payee/Payor</th>
                    <th>Particulars</th>
                    <th>OR#</th>
                    <th>IN</th>
                    <th>OUT</th>
                    <th>Balance</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($ledgers->sortByDesc('ledger_id') as $ledger)
                <tr>
                    <td>{{$ledger->payee}}</td>
                    <td>{{$ledger->description}}</td>
                    <td>{{$ledger->or_number}}</td>
                    @if ($ledger->type == 'Revenue')
                    <td class="pull-right">{{$ledger->amount}}</td>
                    <td></td>
                    @else
                    <td></td>                    
                    <td class="pull-right">{{$ledger->amount}}</td>
                    @endif
                    <td>500</td>
                    <td>
                        <div class="text-center">
                            <a href="{{route('ledger.edit', $ledger->ledger_id)}}" class="btn btn-primary">   <i class="glyphicon glyphicon-pencil">Edit</i></a>
                            <button class="btn btn-outline-danger" data-toggle="modal" data-target="yuki"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </td>
                </tr>
                
                <!-- Modal for Delete-->
                <div class="modal fade" id="yuki">
                    <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header bg-red">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                    <h4 class="modal-title"> Confirm</h4>
                                </div>
                                <div class="modal-body">
                                        <h1>
                                        <i class="fa fa-exclamation-triangle pull-left text-yellow" ></i>
                                        </h1>
                                        <p>Are you sure you want to delete ""</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="#" method="POST">
                                       
                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                            
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        <!-- /.col -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>TOTAL:</th>
                    <th>121</th>
                    <th>232</th>
                    <th>-32</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

    </div>
    <!-- /.box-body -->
</div>
         

@stop

@section('scripts')
@parent
    <script>
        $(function() {
            $('.dailyLedgerTable').DataTable({
                'paging': false,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': false,
                'autoWidth': true,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            })
        })
    </script>
@stop