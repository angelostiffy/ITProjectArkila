        
        <!-- container-->
        <div class="heading text-center" style="color:white;">
                <h2><i class="fa fa-car"></i> Fare Lists and Current Trips</h2>
            </div>
            <!-- Carousel Start-->
            <ul class="owl-carousel testimonials list-unstyled equal-height">
                @foreach($terminals as $terminal)
                <li class="item">
                    <div class="testimonial d-flex flex-wrap">
                        <div class="box zoom" style="margin-top:-10%;">
                            <div class="box-header text-center">
                                <h4>Fare List {{$terminal->description}}</h4>
                            </div>
                            <div class="box-body">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>Destination</th>
                                            <th>Fare</th>
                                        </tr>
                                    </thead>
                                    @foreach($farelist as $fare)
                                        @if($fare->terminal_id == $terminal->terminal_id)
                                        <tr>
                                            <td>{{$fare->description}}</td>
                                            <td>{{$fare->amount}}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    <
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
                                <h4>Current Trip {{$terminal->description}}</h4>
                            </div>
                            <div class="box-body">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Plate No.</th>
                                        </tr>
                                    </thead>
                                    @if($trips->terminal_id == $terminal->terminal_id)
                                    <tr>
                                        <td>{{$trips->queue_number}}</td>
                                        <td>{{$trips->plate_number}}</td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                            <!-- box-body-->
                        </div>
                        <!-- box-->
                    </div>
                    <!-- testimonial-->
                </li>
                @endforeach
            </ul>
            <!-- Carousel End-->