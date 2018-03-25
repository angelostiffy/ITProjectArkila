@extends('layouts.customer_user')
@section('content')
<section id="mainSection" style="background-image: url('{{ URL::asset('img/background.jpg') }}');">
        <div id="content">
            <div class="container">
                <div class="heading text-center">
                    <h2>MY TRANSACTIONS</h2>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" id="boxContainer">
                        <div class="box border-bottom-0">
                            <ul class="nav nav-pills nav-fill">
                                <li class="nav-item"><a class="nav-link active" href="#rentals" data-toggle="tab">Rentals</a></li>
                                <li class="nav-item"><a class="nav-link" href="#reservations" data-toggle="tab">Reservations</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="active tab-pane table-responsive" id="rentals">
                                    <table id="rentals" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Destination</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Scout Barrio</td>
                                                <td>2/9/18</td>
                                                <td>10:00 PM</td>
                                                <td>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewRental">View</button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteWarning">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- tab-pane-->
                                <div class="tab-pane table-responsive" id="reservations">
                                    <table id="reservations" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Destination</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Bengao</td>
                                                <td>02/13/18</td>
                                                <td>8:00 AM</td>
                                                <td>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewReservation">View</button>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteWarning">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- tab-pane-->
                            </div>
                            <!-- tab-content-->
                        </div>
                        <!-- box-->
                    </div>
                    <!-- boxContainer-->
                </div>
                <!-- row-->
            </div>
            <!-- container-->
        </div>
        <!-- content-->
    </section>
    <!-- mainSection-->
    
    <div id="viewRental" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Rental Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Type of Vehicle</th>
                                <td>sadas</td>
                            </tr>
                            <tr>
                                <th>Destination</th>
                                <td>qwdas</td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td>asdasd</td>
                            </tr>
                            <tr>
                                <th>Number of Days</th>
                                <td>qwe</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Comments</th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Reservation Details Modal-->
    <div id="viewReservation" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reservation Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Destination</th>
                                <td>qwdas</td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td>asdasd</td>
                            </tr>
                            <tr>
                                <th>Number of Seats</th>
                                <td>qwe</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Comments</th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="deleteWarning">
        <div class="modal-dialog">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirm</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body row" style="margin: 0% 1%;">
                            <div class="col-md-2" style="font-size: 35px; margin-top: 7px;">
                                <i class="fa fa-exclamation-triangle pull-left" style="color:#d9534f;">  </i>
                            </div>
                            <div class="col-md-10">
                                <p>Are you sure you want to delete this request?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-danger" style="width:30%;">Yes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@stop 

@section('scripts')
@parent


@stop