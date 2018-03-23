@extends('layouts.driver') @section('title', 'Driver Profile') @section('content-title', 'Driver Home') @section('content')
    <div class="desktop">

        <div class="box">
            <table class="table table-bordered table-striped driver">

                <thead>
                    <tr>
                        <th>Trip No.</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Origin</th>
                        <th>Destination</th>
                    </tr>
                </thead>
                <tbody>
                  @php $tripNo = 1; @endphp
                  @foreach($tripsMade as $tripMade)
                    <tr>
                        <td>{{$tripNo}}</td>
                        <td>{{$tripMade->date_departed}}</td>
                        <td>{{$tripMade->time_departed}}</td>
                        <td>{{$tripMade->terminal->description}}</td>
                        <td>{{$superAdmin->description}}</td>
                    </tr>
                    @php $tripNo++; @endphp
                    @endforeach
                </tbody>
            </table>

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
                        <button type="button" class="btn btn-xs btn-primary pull-right" data-date="{{$tripMade->date_departed}}" data-time="{{$tripMade->time_departed}}" data-origin="{{$tripMade->terminal->description}}" data-destination="" data-income="" data-toggle="modal" data-target="#seeLogDetails"><i class="fa fa-eye"></i> View</button>
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


<!--        SEE DETAILS MODAL-->
<div class="modal fade" id="seeLogDetails">
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

                                <input value="" id="dateDeparted" name="" type="text" class="form-control" disabled>

                            </div>
                            <div class="form-group" class="control-label">
                                <label for="">Time:</label>

                                <input value="" id="timeDeparted" name="" type="text" class="form-control" disabled>

                            </div>
                            <div class="form-group" class="control-label">
                                <label for="">Origin:</label>

                                <input value="" id="origin" name="" type="text" class="form-control" disabled>

                            </div>
                            <div class="form-group" class="control-label">
                                <label for="">Destination:</label>

                                <input value="" id="destination" name="" type="text" class="form-control" disabled>

                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h4>Destination</h4>
                                </div>
                                <div class="box-body">

                                    <div class="form-group">

                                        <label for="">Baguio : </label>
                                        <input class="form-control pull-right" onblur="findTotal()" type="text" name="qty" id="qty4" style="width:30%;" disabled>
                                    </div>
                                    <div class="form-group">

                                        <label for="">Nueva Ecija : </label>
                                        <input class="form-control pull-right" onblur="findTotal()" type="text" name="qty" id="qty4" style="width:30%;" disabled>
                                    </div>
                                    <div class="form-group">

                                        <label for="">Total</label>
                                        <input class="form-control pull-right" type="text" name="total" id="total" style="width:30%;" disabled>
                                    </div>
                                </div>


                            </div>
                            <div class="box-footer text-center">

                                <p><strong>Your Income: Php 3500.00</strong></p>
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
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection @section('scripts') @parent

<script>
$(function() {
    $('.driver').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': true
    })
});
</script>

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
