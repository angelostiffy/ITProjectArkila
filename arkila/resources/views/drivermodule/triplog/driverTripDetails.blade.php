@extends('layouts.driver') @section('title', 'Driver Profile') 
@section('content-title', 'Driver Home') 
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div id="content">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h4>Trip Log Details</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group col-md-6" class="control-label">
                                <label for="">Date:</label>
                                <input value="{{$trip->date_departed}}" id="dateDeparted{{$trip->trip_id}}" type="text" class="form-control" disabled>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group col-md-6" class="control-label">
                                <label for="">Time:</label>
                                <input value="{{$trip->time_departed}}" id="timeDeparted{{$trip->trip_id}}" type="text" class="form-control" disabled>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group col-md-6" class="control-label">
                                <label for="">Origin:</label>
                                <input value="{{$trip->terminal->description}}" id="origin{{$trip->trip_id}}" type="text" class="form-control" disabled>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group col-md-6" class="control-label">
                                <label for="">Destination:</label>
                                <input value="{{$superAdmin->description}}" id="destination{{$trip->trip_id}}" type="text" class="form-control" disabled>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group col-md-6" class="control-label">
                                <label for="">Status:</label>
                                <input value="{{$trip->report_status}}" id="status{{$trip->trip_id}}" type="text" class="form-control" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box">
                            <div class="box-header">
                                <h4>Destination</h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        @php $totalPassengers = 0; @endphp
                                          @foreach($destinations as $key => $values)
                                          @if($trip->trip_id == $values->tripid)
                                            @php $innerRoutesArr[$key] = $values; @endphp
                                            <div class="form-group inner-routes">
                                                <label for="">{{$values->destdesc}}</label>
                                                <input class="form-control pull-right" type="number" id="qty{{$trip->trip_id}}" style="width:30%;" value="{{$values->counts}}" disabled>
                                            </div>
                                            @php $totalPassengers = $totalPassengers + $values->counts; @endphp
                                          @endif
                                        @endforeach
                                            <label for="">Total</label>
                                            <input id="totalPassenger{{$trip->trip_id}}" class="form-control pull-right" type="text" id="total" style="width:30%;" value="{{$totalPassengers}}" disabled>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        <div class="box-footer text-center">
                            <p>Your income for this trip: Php <strong id="totalIncome{{$trip->trip_id}}">{{$trip->total_booking_fee}}</strong></p>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.content -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection