@extends('layouts.master')
@section('title', 'General Ledger')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
@stop
@section('content')
<div class="box">
    <!-- /.box-header -->
    <h2 class="text-center">General Ledger</h2>
    
    <div class="col col-md-6">
        <a href="{{route('ledger.create')}}" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-plus"></i>
            Add Revenue/Expense 
        </a>
        <a href="#"  class="btn btn-default btn-sm btn-flat"> <i class="fa fa-print"></i>PRINT</a>
    </div>

    <div class="box-body">
        <table class="table table-bordered table-striped generalLedgerTable">
            <thead>
                <tr>
                    <th>Payee/Payor</th>
                    <th>Particulars</th>
                    <th>OR#</th>
                    <th>IN</th>
                    <th>OUT</th>
                    <th>Balance</th>
                    <th>Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <td></td>
                    <td>{{$booking->description}}</td>
                    <td></td>
                    <td class="text-right">&#8369;{{ $booking->total_amount }}</td>
                    <td></td>
                    <td></td>
                    <td>{{$booking->created_at}}</td>
                    <td></td>
                </tr>
                @endforeach
            @foreach ($ledgers->sortByDesc('ledger_id') as $ledger)
                @if ($ledger->description !== 'Booking Fee' && $ledger->description !== 'SOP')

                <tr>
                    <td>{{$ledger->payee}}</td>
                    <td>{{$ledger->description}}</td>
                    <td>{{$ledger->or_number}}</td>
                    @if ($ledger->type == 'Revenue')

                    <td class="text-right">&#8369;{{$ledger->amount}}</td>
                    <td></td>
                    <td class="text-right">&#8369;{{$ledger->amount}}</td>

                    @else
                    <td></td>                    
                    <td class="text-right">&#8369;{{$ledger->amount}}</td>
                    <td class="text-right">-&#8369;{{$ledger->amount}}</td>
                    @endif
                    
                    <td>{{$ledger->created_at}}</td>

                    <td class="center-block">
                        <div class="text-center">
                            <a href="{{route('ledger.edit', $ledger->ledger_id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i>EDIT</a>
                            <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#{{'deleteLedger'. $ledger->ledger_id}}"><i class="fa fa-trash"></i> DELETE</button>
                        </div>
                    </td>
                </tr>
             
                    <!-- Modal for Delete-->
                    <div class="modal fade" id="{{'deleteLedger'. $ledger->ledger_id}}">
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
                                            <p>Are you sure you want to delete "{{$ledger->description}}"?</p>
                                    </div>
                                    <div class="modal-footer">
                                         <form action="{{route('ledger.destroy', $ledger->ledger_id)}}" method="POST">
                                            {{csrf_field()}} {{method_field('DELETE')}}
                                             
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button> <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            <!-- /.col -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                @endif
                @endforeach
            </tbody>
            @if ($ledgers->count() > 0)
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>TOTAL:</th>
                    <th class="text-right">&#8369;{{$ledger->gledger_total_revenue}}</th>
                    <th class="text-right">&#8369;{{$ledger->gledger_total_expense}}</th>
                    <th class="text-right">&#8369;{{number_format($ledger->gledger_total_balance, 2)}}</th>
                    <th></th>
                </tr>
            </tfoot>
            @endif
        </table>
    </div>
    <!-- /.box-body -->
</div>
         

@stop

@section('scripts')
@parent

<script>
    $(function() {
        $('.generalLedgerTable').DataTable({
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