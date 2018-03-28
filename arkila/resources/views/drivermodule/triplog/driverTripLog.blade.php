@extends('layouts.driver') @section('title', 'Driver Profile') @section('content-title', 'Driver Home') @section('content')
<div class="desktop">
    <div class="box">
        <div class="box-body">
            <table id="driverLog" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Trip No.</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  @php
                    $tripNo = 1;
                    $innerRoutesArr = null;
                  @endphp
                  @foreach($tripsMade as $tripKey => $tripMade)
                    <tr>

                        <td>{{$tripNo}}</td>
                        <td>{{$tripMade->date_departed}}</td>
                        <td>{{$tripMade->time_departed}}</td>
                        <td>{{$tripMade->terminal->description}}</td>
                        <td>{{$superAdmin->description}}</td>
                        <td>
                            <div class="text-center">
                                <a href="" type="button" data-toggle="modal"
                                data-target="#seeLogDetails{{$tripMade->trip_id}}"
                                data-date="{{$tripMade->date_departed}}"
                                data-time="{{$tripMade->time_departed}}"
                                data-origin="{{$tripMade->terminal->description}}"
                                data-destination="{{$superAdmin->description}}"
                                data-innerroutes="@foreach($destinations as $key => $values) @if($tripMade->trip_id == $values->tripid) @php $innerRoutesArr[$key] = $values; @endphp {{$values}} @endif @endforeach"
                                data-income="{{$tripMade->total_booking_fee}}"
                                class="btn btn-primary btn-sm"
                                id="view-trip{{$tripMade->trip_id}}">
                                <i class="fa fa-eye"></i>
                                  VIEW
                                </a>
                            </div>
                        </td>

                    </tr>
                    @php $tripNo++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.desktop -->

<div class="mobile_device_480px">

    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-car"></i>

            <h3 class="box-title">Trip Log</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="list-group">
                @php $tripCount = 1; @endphp
                @foreach($tripsMade as $tripMade)
                <li class="list-group-item">Trip {{$tripCount}} ({{$tripMade->date_departed}} || {{$tripMade->time_departed}})
                    <button type="button" class="view-trip btn btn-xs btn-primary pull-right"
                    data-date="{{$tripMade->date_departed}}"
                    data-time="{{$tripMade->time_departed}}"
                    data-origin="{{$tripMade->terminal->description}}"
                    data-destination="{{$superAdmin->description}}"
                    data-income="{{$tripMade->total_booking_fee}}"
                    data-toggle="modal" data-target="#seeLogDetails{{$tripMade->trip_id}}">
                    <i class="fa fa-eye"></i>
                      View
                    </button>
                </li>
                @endforeach
            </div>
            <!-- /.list -->


        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

</div>
<!-- /.mobile -->

@foreach($tripsMade as $tripKey => $tripMade)
<!--        SEE DETAILS MODAL-->
<div class="modal fade" id="seeLogDetails{{$tripMade->trip_id}}">
    <div class="modal-dialog" style="margin-top:70px;">
        <div class="col-md-offset-2 col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Trip Log Details</h4>
                </div>
                <div class="modal-body">
                    <div class="box">
                        <div class="box-body">
                            <div class="form-group" class="control-label">
                                <label for="">Date:</label>
                                <input id="dateDeparted{{$tripMade->trip_id}}" name="" type="text" class="form-control" disabled>
                            </div>
                            <div class="form-group" class="control-label">
                                <label for="">Time:</label>
                                <input id="timeDeparted{{$tripMade->trip_id}}" name="" type="text" class="form-control" disabled>
                            </div>
                            <div class="form-group" class="control-label">
                                <label for="">Origin:</label>
                                <input id="origin{{$tripMade->trip_id}}" name="" type="text" class="form-control" disabled>
                            </div>
                            <div class="form-group" class="control-label">
                                <label for="">Destination:</label>
                                <input value="" id="destination{{$tripMade->trip_id}}" name="" type="text" class="form-control" disabled>
                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h4>Destination</h4>
                                </div>
                                <div class="box-body" id="inner-dest">
                                      @php $totalPassengers = 0; @endphp
                                      @foreach($destinations as $key => $values)
                                      @if($tripMade->trip_id == $values->tripid)
                                        @php $innerRoutesArr[$key] = $values; @endphp

                                        <div class="form-group inner-routes">
                                            <label for="">{{$values->destdesc}}</label>
                                            <input class="form-control pull-right" type="number" id="qty{{$tripMade->trip_id}}" style="width:30%;" value="{{$values->counts}}" disabled>
                                        </div>
                                        @php $totalPassengers = $totalPassengers + $values->counts; @endphp
                                      @endif
                                    @endforeach

                                        <label for="">Total</label>
                                        <input id="totalPassenger{{$tripMade->trip_id}}" class="form-control pull-right" type="text" id="total" style="width:30%;" value="{{$totalPassengers}}" disabled>
                                    </div>
                                </div>


                            </div>
                            <div class="box-footer text-center">
                                <p>Total Income<strong id="totalIncome{{$tripMade->trip_id}}"></strong></p>
                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.col -->
    </div>
    @endforeach
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection @section('scripts') @parent

<script>
$(function() {
    $('#driverLog').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true
    })
});
</script>

@foreach($tripsMade as $trip)
<script>
$(document).ready(function(){
  $('#view-trip{{$trip->trip_id}}').click(function(){
    $('#dateDeparted{{$trip->trip_id}}').val($(this).data('date'));
    $('#timeDeparted{{$trip->trip_id}}').val($(this).data('time'));
    $('#origin{{$trip->trip_id}}').val($(this).data('origin'));
    $('#destination{{$trip->trip_id}}').val($(this).data('destination'));
    var income = $(this).data('income');
    $('#totalIncome{{$trip->trip_id}}').html(income.toString());
    console.log(income.toString());
  });
});
</script>
@endforeach
<style>
    /* if desktop */

    .mobile_device_380px {
        display: none;
    }

    .mobile_device_480px {
        display: none;
    }


    /* if mobile device max width 380px */

    @media only screen and (max-device-width: 380px) {
        .mobile_device_380px {
            display: block;
        }
        .desktop {
            display: none;
        }
    }

    /* if mobile device max width 480px */

    @media only screen and (max-device-width: 480px) {
        .mobile_device_480px {
            display: block;
        }
        .desktop {
            display: none;
        }
    }
</style>

@endsection
