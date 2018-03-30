@extends('layouts.customer_user')
@section('content')
<section id="mainSection" style="background-image: url('{{ URL::asset('img/background.jpg') }}');">
        <div class="container">
            <div class="heading text-center">
                <h2>Reserve a Trip</h2>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" id="boxContainer">
                    <form class="contact100-form" action="{{route('customermodule.storeReservation')}}" method="POST">
                        {{csrf_field()}}
                        <div class="wrap-input100">
                            <select id="destination" name="destination" class="input100" placeholder="Destinations">
                                
                                @foreach($destinations as $destination)
                                    <option value="{{$destination->destination_id}}">{{$destination->description}}</option>
                                @endforeach
                           </select>
                            <span class="focus-input100"></span>
                        </div><!-- wrap-input100-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="wrap-input100">
                                    <input id="contactNumber" class="input100" type="text" placeholder="Contact Number(+63)" name="contactNumber" value="" data-inputmask='"mask": "999-999-9999"' data-mask>
                                    <span class="focus-input100"></span>
                                </div><!-- wrap-input100-->
                            </div><!-- col-->
                            <div class="col-md-6">
                                <div class="wrap-input100">
                                    <input id="name" class="input100" type="number" name="numberOfSeats" placeholder="Number of Seats">
                                    <span class="focus-input100"></span>
                                </div><!-- wrap-input100-->
                            </div><!-- col-->
                        </div><!-- row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="wrap-input100">
                                    <input id="date" class="input100 datepicker" type="text" name="date" placeholder="Date">
                                    <span class="focus-input100"></span>
                                </div><!-- wrap-input100-->
                            </div><!-- col-->
                            <div class="col-md-6">
                                <div class="wrap-input100">
                                    <div class="bootstrap-timepicker">
                                        <input type="text" id="timepicker" class="input100 timepicker" name="time" placeholder="Time">
                                        <span class="focus-input100"></span>
                                    </div><!-- bootstrap-timepicker-->
                                </div><!-- wrap-input100-->
                            </div><!-- col-->
                        </div><!-- row-->
                        <div class="wrap-input100">
                            <textarea id="message" class="input100" name="message" placeholder="Additional comments..."></textarea>
                            <span class="focus-input100"></span>
                        </div><!-- wrap-input100-->
                        <div class="container-contact100-form-btn">
                            <button type="button" class="contact100-form-btn" data-toggle="modal" data-target="#addSuccess"><strong>Book</strong></button>
                        </div><!-- container-contact100-form-btn-->
                    
                    <!-- contact100-form-->
                </div>
                <!-- col-->
            </div>
            <!-- row-->
        </div>
        <!-- container-->
    </section>
    <!-- main section-->
    
    <div id="addSuccess" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background:#5cb85c; color:white; font-family: Montserrat-Regular;">
                    <h4 class="text-center"><i class="fa fa-check-circle" style="font-size: 80px; padding-left:200px;"></i></h4>
                </div>
                <div class="modal-body">

                    <p class="text-center" style="margin-bottom:10px;"><strong>Reservation Summary</strong></p>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Destination</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Number of Seats</th>
                                <td></td>
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
                    <button type="submit" class="contact100-form-btn"><strong>Submit</strong></button>
                </div>
                <!-- modal-body-->
            </div>
            </form>
            <!-- modal-content-->
        </div>
        <!-- modal-dialog-->
    </div>
    <!-- addSuccess-->
@stop 