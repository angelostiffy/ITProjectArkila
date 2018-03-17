@extends('layouts.master')
@section('title', 'Reservations')
@section('content-header', 'Reservations')
@section('links')
@parent
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
                        <li lass="active"><a href="#tab_1" data-toggle="tab">List of Reservations</a>
                        <li><a href="#tab_2" data-toggle="tab">Online Reservation</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div style="margin-bottom:1%">
                                <a href="/home/reservations/create" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Create New</a>
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

                                    @foreach ($reservations as $reservation) 
                                    @if ($reservation->status == 'Paid' | $reservation->status == 'Departed' | $reservation->status == 'Cancelled' )
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
                                                
                                                    
                                                @if ($reservation->status == 'Paid')
                                                
                                                    <button class="btn btn-primary" type="submit" name="butt" data-toggle="modal" data-target="#{{'depart'.$reservation->id}}" value="Departed"><i class="fa fa-automobile"></i> Depart</button>
                                                
                                                    <button class="btn btn-outline-danger" type="submit" name="butt" data-toggle="modal" data-target="#{{'cancel'.$reservation->id}}" value="Cancelled"><i class="fa fa-close"></i> Cancel</button>
                                                
                                                
                                                     <!-- Modal for Cancelation-->
                                                     <div class="modal fade" id="{{'cancel'.$reservation->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="col-md-offset-2 col-md-8">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-red">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title"> Confirm</h4>
                                                                    </div>
                                                                    <div class="modal-body row" style="margin: 0% 1%;">
                                                                        <div class="col-md-2" style="font-size: 35px; margin-top: 7px;">
                                                                            <i class="fa fa-exclamation-triangle pull-left" style="color:#d9534f;">  </i>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <p style="font-size: 110%;">Are you sure you want to cancel this reservation?</p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                       <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                                                                            {{ csrf_field() }} {{ method_field('PATCH') }} 

                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">discard</button>
                                                                            <button type="submit" name="driverArc" value="Arch " class="btn btn-danger" style="width:22%;">Cancel</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->

                                                    <!-- Modal for depart-->
                                                     <div class="modal fade" id="{{'depart'.$reservation->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="col-md-offset-2 col-md-8">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-primary">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title"> Confirm</h4>
                                                                    </div>
                                                                    <div class="modal-body row" style="margin: 0% 1%;">

                                                                        <p style="font-size: 110%;">Are you sure you want to depart this reservation?</p>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                       <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
                                                                            {{ csrf_field() }} {{ method_field('PATCH') }} 

                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                            <button type="submit" name="driverArc" value="Arch " class="btn btn-primary" style="width:22%;">Depart</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->

                                                @else
                                               
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#{{'deletion'.$reservation->id}}"><i class="fa fa-close"></i> Delete</button>
                                                
                                                
                                                <!-- Modal for Deletion-->
                                                 <div class="modal fade" id="{{'deletion'.$reservation->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="col-md-offset-2 col-md-8">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-red">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title"> Confirm</h4>
                                                                </div>
                                                                <div class="modal-body row" style="margin: 0% 1%;">
                                                                    <div class="col-md-2" style="font-size: 35px; margin-top: 7px;">
                                                                        <i class="fa fa-exclamation-triangle pull-left" style="color:#d9534f;">  </i>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <p style="font-size: 110%;">Are you sure you want to delete this reservation?</p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form method="POST" action="/home/reservations/{{$reservation->reservation_id}}" class="delete">
                                                                        {{csrf_field()}} {{method_field('DELETE')}}

                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                        <button type="submit" name="driverArc" value="Arch " class="btn btn-danger" style="width:22%;">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                                
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                    @endif 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane" id="tab_2">

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

                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </div>
</section>
@endsection 
@section('scripts') 
@parent
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