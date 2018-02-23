@extends('layouts.master')
@section('title', 'Reservations')
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
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Online Reservation</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Walk-in Reservation</a></li>
                                    <li><a href="#tab_3" data-toggle="tab">List of Reservations</a></li>

                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <b>Details:</b>
                                        @foreach($reservations->where('type', 'Online') as $reservation)
                                        <table class="table table-bordered table-striped example1">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Contact Number</th>
                                                    <th>Departure Date</th>
                                                    <th>Departure Time</th>
                                                    <th>Destination</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $reservation->name }}</td>
                                                    <td>{{ $reservation->contact_number }}</td>
                                                    <td>{{ $reservation->departure_date }}</td>
                                                    <td>{{ $reservation->departure_time }}</td>
                                                    <td>{{ $reservation->destination->description }}</td>
                                                    <td class="center-block">
                                                        <div class="center-block">
                                                        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PATCH') }}

                                                            @if ($reservation->status == 'Pending')
                                                                <button class="btn btn-success" type="submit" name="butt" value="Approved"><i class="fa fa-check"></i> Approve</button>
                                                                <button class="btn btn-danger" type="submit" name="butt" value="Declined"><i class="fa fa-close"></i> Decline</i></button>
                                                            @elseif ($reservation->status == 'Approved')
                                                                <button class="btn btn-success" type="submit" name="butt" value="Paid"><i class="fa fa-check"></i> Paid</button>
                                                                <button class="btn btn-danger" type="submit" name="butt" value="Cancelled"><i class="fa fa-close"></i> Cancel</i></button>
                                                            @else
                                                                <p><b> {{ $reservation->status }} </b></p>
                                                            @endif
                                                        </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                        </table>
                                        @endforeach
                                    </div>

                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                    <form action="{{ route('reservations.store', $reservation->id) }}" method="POST">
                                                            {{ csrf_field() }}

                                        <label>Destination</label>
                                        <div class="form-group">

                                            <select name="dest" class="form-control select2 select2-hidden-accessible" style="width: 50%;" tabindex="-1" aria-hidden="true">
                                              <option>Select Destination</option>
                                              @foreach($destinations as $destination)
                                              <option value="{{ $destination->destination_id }}">{{ $destination->description }}</option>
                                    @endforeach
                                            </select>


                                        </div>

                                        <div class="form-group fixMarginRight ">
                                        <label>Full Name</label>
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" max=15 min=1>
                                            </div>

                                            <label>Departure Date:</label>

                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="date" class="form-control pull-right" id="datepicker">
                                            </div>

                                            <!-- time Picker -->
                                            <div class="bootstrap-timepicker">
                                                <div class="form-group">
                                                    <label>Time picker:</label>

                                                    <div class="input-group">
                                                        <input type="text" name="type" class="form-control timepicker">

                                                        <div class="input-group-addon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </div>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                                <!-- /.form group -->
                                            </div>

                                            <label>Number of Seats</label>
                                            <div class="form-group">
                                                <input type="number" name="seat" class="form-control" max=15 min=1>
                                            </div>
                                            <!-- /.input group -->
                                            <label>Contact Number</label>
                                            <div class="form-group">
                                                <input type="number" name="contact" class="form-control" max=15 min=1>
                                            </div>
                                        </div>
                                            <input type="hidden" name="type" value="Walk-in">
                                            <div>
                                                <!-- Trigger the modal with a button -->
                                                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Submit</button>
                                            </form>

                                            <!-- Modal -->
                                            <div id="myModal" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Walk-in Reservation Information</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Origin: Baguio City</p>
                                                            <p> Destination: Cabanatuan </p>
                                                            <p>Preferred date: 01/17/17</p>
                                                            <p>Departure time: 2:30 PM</p>
                                                            <p> Total Passengers :2 </p>

                                                            <p>Fare Amount: PHP 350.00</p>
                                                            <p>Total Passenger : 2 </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Confirm</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    

                                    <div class="tab-pane" id="tab_3">
                                    @foreach($reservations as $reservation)
                                        <table class="table table-bordered table-striped example1">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Destination</th>
                                                    <th>Time</th>
                                                    <th>Number of Seats</th>
                                                    <th>Contact Number</th>
                                                    <th>Transaction</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $reservation->name }}</td>
                                                    <td>{{ $reservation->destination->description }}</td>
                                                    <td>{{ $reservation->departure_time }}</td>
                                                    <td>{{ $reservation->number_of_seats }}</td>
                                                    <td>{{ $reservation->contact_number }}</td>
                                                    <td>{{ $reservation->type }}</td>
                                                    <td class="center-block">
                                                        <div class="center-block">
                                                            <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('PATCH') }}

                                                                @if ($reservation->status == 'Pending')
                                                                    <button class="btn btn-success" type="submit" name="butt" value="Approved"><i class="fa fa-check"></i> Approve</button>
                                                                    <button class="btn btn-danger" type="submit" name="butt" value="Declined"><i class="fa fa-close"></i> Decline</i></button>
                                                                @elseif ($reservation->status == 'Approved')
                                                                    <button class="btn btn-success" type="submit" name="butt" value="Paid"><i class="fa fa-check"></i> Paid</button>
                                                                    <button class="btn btn-danger" type="submit" name="butt" value="Cancelled"><i class="fa fa-close"></i> Cancel</i></button>
                                                                @else
                                                                    <p><b> {{ $reservation->status }} </b></p>
                                                                @endif
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @endforeach
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
  $(function () {
    $('.example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
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
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
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
</script>

@endsection