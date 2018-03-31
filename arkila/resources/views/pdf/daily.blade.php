<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Drivers</title>
</head>
<body>
<style>
        table
        {
            width: 100%;
        }
        th, td
        {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        h2, h3 
        {
            text-align: center;
        }
    </style>
    <h2>Ban Trans Daily Ledger</h2>
    <h3>{{ $date->formatLocalized('%A %d %B %Y') }}</h3>
    
        <table>
            <thead>
                <tr>
                    <th>Payee/Payor</th>
                    <th>Particulars</th>
                    <th>OR#</th>
                    <th>IN</th>
                    <th>OUT</th>
                    <th>Balance</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($ledgers->sortByDesc('ledger_id') as $ledger)
                @if ($ledger->created_at->format('m-d-Y') == $date->format('m-d-Y'))
                <tr>
                        <td>{{$ledger->payee}}</td>
                        <td>{{$ledger->description}}</td>
                        <td>{{$ledger->or_number}}</td>
                        @if ($ledger->type == 'Revenue')

                        <td>P{{$ledger->amount}}</td>
                        <td></td>
                        <td>P{{$ledger->amount}}</td>

                        @else
                        <td></td>                    
                        <td>P{{$ledger->amount}}</td>
                        <td>-P{{$ledger->amount}}</td>

                        @endif
                    </tr>
                @endif                
                @endforeach
                 @if ($ledgers->count() > 0)
                    <tr>
                        <td></td>
                        <td>Booking Fee(Baguio)</td>
                        <td></td>
                        <td>P{{$ledger->booking_fee}}</td>
                        <td></td>
                        <td>P{{$ledger->booking_fee}}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>SOP</td>
                        <td></td>
                        <td>P{{$ledger->sop}}</td>
                        <td></td>
                        <td>P{{$ledger->sop}}</td>
                        <td></td>
                    </tr>

            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>TOTAL:</th>
                    <th>P{{$ledger->total_revenue}}</th>
                    <th>P{{$ledger->total_expense}}</th>
                    <th>P{{ number_format($ledger->balance, 2) }}</th>
                    <th></th>
                </tr>
            </tfoot>
            @endif
        </table>
</body>
</html>
         