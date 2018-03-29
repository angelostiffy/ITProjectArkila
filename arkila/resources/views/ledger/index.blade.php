@extends('layouts.master')
@section('title', 'Daily Ledger')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
@stop
@section('content')

<div id="ledgerInfo" class="box">
    <!-- /.box-header -->
    <name id="ledgerDate" style="font-size: 13pt">March 23, 2018</name>
    <a href="{{route('ledger.create')}}" class="btn btn-primary btn-md" data-target="#addExpRev">
        Add <span class="glyphicon glyphicon-plus-sign"></span> 
    </a>

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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($ledgers->sortByDesc('ledger_id') as $ledger)
                <tr>
                    <td>{{$ledger->payee}}</td>
                    <td>{{$ledger->description}}</td>
                    <td>{{$ledger->or_number}}</td>
                    @if ($ledger->type == 'Revenue')
                    <td>&#8369;{{$ledger->amount}}</td>
                    <td></td>
                    <td>&#8369;{{$ledger->amount}}</td>

                    @else
                    <td></td>                    
                    <td>&#8369;{{$ledger->amount}}</td>
                    <td>-&#8369;{{$ledger->amount}}</td>
                    @endif
                    <td class="center-block">
                        <div class="center-block">
                            <a href="{{route('ledger.edit', $ledger->ledger_id)}}" class="btn btn-primary">   <i class="glyphicon glyphicon-pencil">Edit</i></a>
                            <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
                <p>Total Balance: {{ $ledger->balance }}</p>

    </div>
    <!-- /.box-body -->
</div>
         

@stop

@section('scripts')
@parent
    <script>
        $(function() {
            $('.dailyLedgerTable').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': false,
                'ordering': true,
                'info': false,
                'autoWidth': true
            })
        })
    </script>
@stop