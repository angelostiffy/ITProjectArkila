@extends('layouts.customer_non_user')
@section('content')
<section style="background: url('{{ URL::asset('img/photogrid.jpg') }}') center center repeat; background-size: cover;" class="bar background-white relative-positioned">
        <div class="container">
            <!-- Carousel Start-->
            <div class="home-carousel">
                <div class="dark-mask mask-primary"></div>
                <div class="container">
                    <div class="homepage owl-carousel">
                        <div class="item">
                            <div class="row">
                                <div class="col-md-5 text-right">
                                    <h1>3 Branches to serve you!</h1>
                                    <p>Baguio. Cabanatuan. San Jose.</p>
                                </div>
                                <div class="col-md-7"><img src="{{ URL::asset('img/template-homepage.png') }}" alt="" class="img-fluid">
                                </div>
                                <!-- col-->
                            </div>
                            <!-- row-->
                        </div>
                        <!-- item-->
                        <div class="item">
                            <div class="row">
                                <div class="col-md-7 text-center"><img src="../img/template-mac.png" alt="" class="img-fluid"></div>
                                <div class="col-md-5">
                                    <h2>Baguio Terminal Operating Hours</h2>
                                    <ul class="list-unstyled">
                                        <li>Operating Hours 4:00 am - 6:00 pm daily</li>
                                        <li>Office Hours 7:00 am - 7:00 pm daily</li>
                                    </ul>
                                </div>
                                <!-- col-->
                            </div>
                            <!-- row-->
                        </div>
                        <!-- item-->
                        <div class="item">
                            <div class="row">
                                <div class="col-md-5 text-right">
                                    <h1>Need a Van Rental for a special occasion?</h1>
                                    <p>Ban Trans is here for you!</p>
                                </div>
                                <div class="col-md-7"><img src="../img/template-easy-customize.png" alt="" class="img-fluid"></div>
                                <!-- col-->
                            </div>
                            <!-- row-->
                        </div>
                        <!-- item-->
                        <div class="item">
                            <div class="row">
                                <div class="col-md-7"><img src="../img/template-easy-code.png" alt="" class="img-fluid"></div>
                                <div class="col-md-5">
                                    <h1>Need a Seat Reservation for a Trip?</h1>
                                    <p>We've got you!</p>
                                </div>
                                <!-- col-->
                            </div>
                            <!-- row-->
                        </div>
                        <!-- item-->
                    </div>
                    <!-- homepage-->
                </div>
                <!-- container-->
            </div>
            <!-- Carousel End-->
        </div>
        <!-- container-->
    </section>
    <!-- section-->

    <section style="background: url(../img/fixed-background-2.jpg) center top no-repeat; background-size: cover;" class="bar text-center bg-fixed relative-positioned">
        <div class="dark-mask">

        </div>
        <div class="container">
            <div class="heading text-center" style="color:white;">
                <h2><i class="fa fa-car"></i> Fare Lists and Current Trips</h2>
            </div>
            <!-- Carousel Start-->
            <ul class="owl-carousel testimonials list-unstyled equal-height">
                <li class="item">
                    <div class="testimonial d-flex flex-wrap">
                        <div class="box zoom" style="margin-top:-10%;">
                            <div class="box-header text-center">
                                <h4>Fare List Cabanatuan</h4>
                            </div>
                            <div class="box-body">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>Destination</th>
                                            <th>Fare</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>Jan lang</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>Jan lang</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>Jan lang</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>Jan lang</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>Jan lang</td>
                                        <td>50</td>
                                    </tr>
                                </table>
                            </div><!-- box-body-->
                        </div><!-- box-->
                    </div><!-- testimonial-->
                </li>
                <li class="item">
                    <div class="testimonial d-flex flex-wrap">
                        <div class="box zoom" style="margin-top:-10%;">
                            <div class="box-header text-center">
                                <h4>Current Trip Cabanatuan</h4>
                            </div>
                            <div class="box-body">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Plate No.</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>1</td>
                                        <td>NQS-977</td>
                                    </tr>
                                </table>
                            </div><!-- box-body-->
                        </div><!-- box-->
                    </div><!-- testimonial-->
                </li>
                <li class="item">
                    <div class="testimonial d-flex flex-wrap">
                        <div class="box zoom" style="margin-top:-10%;">
                            <div class="box-header text-center">
                                <h4>Fare List San Jose</h4>
                            </div>
                            <div class="box-body">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>Destination</th>
                                            <th>Fare</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>Jan lang</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>Jan lang</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>Jan lang</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>Jan lang</td>
                                        <td>50</td>
                                    </tr>
                                    <tr>
                                        <td>Jan lang</td>
                                        <td>50</td>
                                    </tr>
                                </table>
                            </div><!-- box-body-->
                        </div><!-- box-->
                    </div><!-- testimonial-->
                </li>
                <li class="item">
                    <div class="testimonial d-flex flex-wrap">
                        <div class="box zoom" style="margin-top:-10%;">
                            <div class="box-header text-center">
                                <h4>Current Trip San Jose</h4>
                            </div>
                            <div class="box-body">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Plate No.</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>1</td>
                                        <td>NQS-977</td>
                                    </tr>
                                </table>
                            </div><!-- box-body-->
                        </div><!-- box-->
                    </div><!-- testimonial-->
                </li>
            </ul>
            <!-- Carousel End-->
        </div><!-- container-->
    </section><!-- section-->
@stop