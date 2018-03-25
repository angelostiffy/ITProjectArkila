@extends('layouts.customer_user')
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
        <!-- section-->
    </section>
    <!-- section-->

    <section style="background: url('{{ URL::asset('img/fixed-background-2.jpg') }}') center top no-repeat; background-size: cover;" class="bar text-center bg-fixed relative-positioned">
        <div class="dark-mask"></div>
        <div class="container">
            <div class="heading text-center" style="color:white;">
                <h2><i class="fa fa-bullhorn"></i> Announcements</h2>
            </div>
            <!-- Carousel Start-->
            <ul class="owl-carousel testimonials list-unstyled equal-height">
                <li class="item">
                    <div class="testimonial d-flex flex-wrap">
                        <div class="text">
                            <h3>TITLE</h3>
                            <p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought. It wasn't a dream.</p>
                            <a href="" class="pull-right">see more...</a>
                        </div>
                        <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                            <div class="icon"><i class="fa fa-calendar"></i> </div>
                            <div class="testimonial-info d-flex">

                                <h5>February 7, 1998</h5>
                            </div>
                            <!-- estimonial-info-->
                        </div>
                        <!-- bottom-->
                    </div>
                    <!-- testimonial-->
                </li>
                <li class="item">
                    <div class="testimonial d-flex flex-wrap">
                        <div class="text">
                            <h3>TITLE</h3>
                            <p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought. It wasn't a dream.</p>
                        </div>
                        <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                            <div class="icon"><i class="fa fa-calendar"></i> </div>
                            <div class="testimonial-info d-flex">

                                <h5>February 7, 1998</h5>
                            </div>
                            <!-- estimonial-info-->
                        </div>
                        <!-- bottom-->
                    </div>
                    <!-- testimonial-->
                </li>
                <li class="item">
                    <div class="testimonial d-flex flex-wrap">
                        <div class="text">
                            <h3>TITLE</h3>
                            <p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought. It wasn't a dream.</p>
                        </div>
                        <div class="bottom d-flex align-items-center justify-content-between align-self-end">
                            <div class="icon"><i class="fa fa-calendar"></i> </div>
                            <div class="testimonial-info d-flex">

                                <h5>February 7, 1998</h5>
                            </div>
                            <!-- estimonial-info-->
                        </div>
                        <!-- bottom-->
                    </div>
                    <!-- testimonial-->
                </li>
                <li class="item">
                    <div class="testimonial d-flex flex-wrap">
                        <div class="text">
                            <h3>TITLE</h3>
                            <p>The bedding was hardly able to cover it and seemed ready to slide off any moment. His many legs, pitifully thin compared with the size of the rest of him, waved about helplessly as he looked. "What's happened to me? " he thought. It wasn't a dream.</p>
                        </div>
                        <div class="bottom d-flex align-items-center justify-content-between align-self-end" style="margin-top:30px;">
                            <div class="icon"><i class="fa fa-calendar"></i> </div>
                            <div class="testimonial-info d-flex">

                                <h5>February 7, 1998</h5>
                            </div>
                            <!-- estimonial-info-->
                        </div>
                        <!-- bottom-->
                    </div>
                    <!-- testimonial-->
                </li>
            </ul>
            <!-- Carousel End-->
        </div>
        <!-- container-->
    </section>
    <!-- section-->

    <section style="background: url('{{ URL::asset('img/baguio-lion.jpg') }}') center top no-repeat; background-size: cover;" class="bar text-center bg-fixed relative-positioned">
        <div class="dark-mask"></div>
        <div class="container">
            <div class="heading text-center">
                <h2><i class="fa fa-bolt"></i> Weather Updates</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 text-center" style="padding-top:5px;">
                    <!-- Baguio Weather Widget-->
                    <!-- weather widget start --><a target="_blank" href="http://www.booked.net/weather/baguio-city-12231"><img src="https://w.bookcdn.com/weather/picture/28_12231_1_1_e67e22_250_d35401_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=124&domid=w209&anc_id=37033" alt="booked.net"/></a>
                    <!-- weather widget end -->
                </div>
                <div class="col-lg-4 text-center" style="padding-top:5px;">
                    <!-- San Jose Weather Widget-->
                    <!-- weather widget start --><a target="_blank" href="http://www.booked.net/weather/munoz-w434073"><img src="https://w.bookcdn.com/weather/picture/28_w434073_1_1_e67e22_250_d35401_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=124&domid=w209&anc_id=46479" alt="booked.net"/></a>
                    <!-- weather widget end -->
                </div>
                <div class="col-lg-4 text-center" style="padding-top:5px;">
                    <!-- Cabanatuan Weather Widget-->
                    <!-- weather widget start --><a target="_blank" href="http://www.booked.net/weather/cabanatuan-city-33111"><img src="https://w.bookcdn.com/weather/picture/28_33111_1_1_e67e22_250_d35401_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=124&domid=w209&anc_id=68269" alt="booked.net"/></a>
                    <!-- weather widget end -->
                </div>
            </div>
            <!-- row-->
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
                            </div>
                            <!-- box-body-->
                        </div>
                        <!-- box-->
                    </div>
                    <!-- testimonial-->
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
                            </div>
                            <!-- box-body-->
                        </div>
                        <!-- box-->
                    </div>
                    <!-- testimonial-->
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
                            </div>
                            <!-- box-body-->
                        </div>
                        <!-- box-->
                    </div>
                    <!-- testimonial-->
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
                            </div>
                            <!-- box-body-->
                        </div>
                        <!-- box-->
                    </div>
                    <!-- testimonial-->
                </li>
            </ul>
            <!-- Carousel End-->
        </div>
        <!-- container-->
    </section>
    <!-- section-->
@stop