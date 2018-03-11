@extends('layouts.driver') @section('title', 'Driver Profile') @section('content-title', 'Driver Home') @section('content')
<div id="content">
    <div class="desktop">

        <div class="box">
            <table id="driver" class="table table-bordered table-striped">

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
                    <tr>
                        <td>1</td>
                        <td>puggggg</td>
                        <td>Chabal loves shaina</td>
                        <td>15</td>
                        <td>chabal</td>
                    </tr>
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
                    <li class="list-group-item">Trip 1 (February 9, 2018 || 5:00 pm)
                        <button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#seeLogDetails"><i class="fa fa-eye"></i> View</button>
                    </li>
                    <li class="list-group-item">Trip 2 (February 9, 2018 || 5:00 pm)
                        <button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#seeLogDetails"><i class="fa fa-eye"></i> View</button>
                    </li>
                    <li class="list-group-item">Trip 3 (February 9, 2018 || 5:00 pm)
                        <button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#seeLogDetails"><i class="fa fa-eye"></i> View</button>
                    </li>
                </div>
                <!-- /.list -->


            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <!-- /.mobile -->
</div>
<!-- /.content -->

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

                                <input value="" id="" name="" type="text" class="form-control" disabled>

                            </div>
                            <div class="form-group" class="control-label">
                                <label for="">Time:</label>

                                <input value="" id="" name="" type="text" class="form-control" disabled>

                            </div>
                            <div class="form-group" class="control-label">
                                <label for="">Origin:</label>

                                <input value="" id="" name="" type="text" class="form-control" disabled>

                            </div>
                            <div class="form-group" class="control-label">
                                <label for="">Destination:</label>

                                <input value="" id="" name="" type="text" class="form-control" disabled>

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