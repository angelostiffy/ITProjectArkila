@extends('layouts.master')
@section('title', 'General Ledger')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@stop
@section('content')
<div class="box">
    <!-- /.box-header -->
    <h2 class="box-header text-center">General Ledger</h2>
    <div class="col col-md-6">
        <div id="reportrange" name="dateBetween" style="background: #fff; cursor: pointer; padding: 7px 10px; border: 1px solid #ccc; width: 60%">
        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
        <span></span> <b class="caret"></b>
        </div>
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
                    <td class="text-right">&#8369;{{ $booking->total_amount }}</td>
                    <td>{{$booking->created_at->formatLocalized('%B %d, %Y')}}</td>
                    <td></td>
                </tr>
                @endforeach
                @foreach ($sops as $sop)
                <tr>
                    <td></td>
                    <td>{{$sop->description}}</td>
                    <td></td>
                    <td class="text-right">&#8369;{{ $sop->total_amount }}</td>
                    <td></td>
                    <td class="text-right">&#8369;{{ $sop->total_amount }}</td>
                    <td>{{$sop->created_at->formatLocalized('%B %d, %Y')}}</td>
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
                    
                    <td>{{$ledger->created_at->formatLocalized('%B %d, %Y')}}</td>

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

<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"> </script>

<script>
    $(document).ready(function() {
        $('.generalLedgerTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ],
            'paging': false,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': false,
            'autoWidth': true,
            'order': [[ 6, "desc" ]],
            'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [-1] /* 1st one, start by the right */
            }]
        })
    });
    $(function() {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });

</script>

@stop