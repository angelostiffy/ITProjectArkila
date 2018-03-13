@extends('layouts.master') 
@section('title', 'Reservations') 
@section('links') @parent
<link rel="stylesheet" href="public\css\myOwnStyle.css"> 
@stop 
@section('content')

<section class="content">
    <div class="box">

        <div class="box-body">
            <div class="col-xl-6">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Online Reservation</a></li>
                        <li><a href="#tab_2" data-toggle="tab">List of Reservations</a></li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <b>Details:</b>
                            <table class="table table-bordered table-striped listReservation">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact Number</th>
                                        <th>Destination</th>
                                        <th>Preferred Date</th>
                                        <th>Time</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations->where('type', 'Online') as $reservation)
                                    <tr>
                                        <td>{{ $reservation->id }}</td>
                                        <td>{{ $reservation->name }}</td>
                                        <td>{{ $reservation->contact_number }}</td>
                                        <td>{{ $reservation->destination->description }}</td>
                                        <td>{{ $reservation->departure_date }}</td>
                                        <td>{{ $reservation->departure_time }}</td>
                                        <td>{{ $reservation->amount }}</td>
                                        <td>{{ $reservation->status }}</td>
                                        <td class="center-block">
                                            
                                                <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                                                    {{ csrf_field() }} {{ method_field('PATCH') }}
                                                    
                                                    @if ($reservation->status == 'Pending')
                                                        <button class="btn btn-success" type="submit" name="butt" onclick="return ConfirmStatus()" value="Paid"><i class="fa fa-automobile"></i> Paid</button>
                                                        <button class="btn btn-danger" type="submit" name="butt" onclick="return ConfirmStatus()" value="Declined"><i class="fa fa-close"></i> Decline</button> 
                                                    
                                                    @elseif ($reservation->status == 'Paid')
                                                    
                                                        <button class="btn btn-success" type="submit" name="butt" onclick="return ConfirmStatus()" value="Departed"><i class="fa fa-automobile"></i> Depart</button>
                                                        <button class="btn btn-danger" type="submit" name="butt" onclick="return ConfirmStatus()" value="Cancelled"><i class="fa fa-close"></i> Cancel</button> @else
                                                        <form method="POST" action="/home/reservations/{{$reservation->reservation_id}}" class="delete">
                                                            {{csrf_field()}} {{method_field('DELETE')}}
                                                            <button class="btn btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-close"></i> Delete</button>
                                                        </form>
                                                    @endif
                                                </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="tab_2">
                            <div class="form-group">
                                <a href="/home/reservations/create" class="btn btn-primary">Add Walk-in Reservation</a>
                            </div>
                            <table class="table table-bordered table-striped listReservation">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Contact Number</th>
                                        <th>Destination</th>
                                        <th>Preffered Date</th>
                                        <th>Time</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($reservations as $reservation) @if ($reservation->status == 'Paid' | $reservation->status == 'Departed' | $reservation->status == 'Cancelled' )
                                    <tr>
                                        <td>{{ $reservation->id }}</td>
                                        <td>{{ $reservation->name }}</td>
                                        <td>{{ $reservation->contact_number }}</td>
                                        <td>{{ $reservation->destination->description }}</td>
                                        <td>{{ $reservation->departure_date }}</td>
                                        <td>{{ $reservation->departure_time }}</td>
                                        <td>{{ $reservation->amount }}</td>
                                        <td>{{ $reservation->status }}</td>
                                        <td class="center-block">
                                            <div class="center-block">
                                                <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                                                    {{ csrf_field() }} {{ method_field('PATCH') }} @if ($reservation->status == 'Paid')
                                                    <button class="btn btn-success" type="submit" name="butt" onclick="return ConfirmStatus()" value="Departed"><i class="fa fa-automobile"></i> Depart</button>
                                                    <button class="btn btn-danger" type="submit" name="butt" onclick="return ConfirmStatus()" value="Cancelled"><i class="fa fa-close"></i> Cancel</button>
                                                </form>
                                                @else
                                                <form method="POST" action="/home/reservations/{{$reservation->reservation_id}}" class="delete">
                                                    {{csrf_field()}} {{method_field('DELETE')}}
                                                    <button class="btn btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-close"></i> Delete</button>
                                                </form>
                                                @endif
                                      
                                            </div>
                                        </td>
                                    </tr>
                                    @endif 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
</section>

@endsection @section('scripts') @parent
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function() {
        $('.listReservation').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            "order": [
                [1, "desc"]
            ]

        })

    })
</script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })

    function ConfirmDelete() {
        var x = confirm("Delete this request?");
        if (x)
            return true;
        else
            return false;
    }

    function ConfirmStatus() {
        var x = confirm("Change status?");

        if (x)
            return true;
        else
            return false;

    }
</script>

@endsection