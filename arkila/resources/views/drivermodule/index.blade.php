@extends('layouts.driver')
@section('title', 'Driver Home')

@section('content-title', 'Driver Home')
@section('content')
                <div class="col-md-6 ">

                    <div class="slider">

                        <div id="home-slider" class="carousel slide box-trip" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                  <div class="item  active">
                                      <div class="box">
                                          <div class="box-header with-border text-center">
                                              <h4>{{$announcements->first()->title}}</h4>
                                          </div>
                                            <div class="box-body text-center">
                                              <div style="width:70%; margin-left:15%;">
                                                  <p>{{$announcements->first()->description}}</p>
                                              </div>
                                          </div>

                                          <div class="box-footer text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#seeMoreAnnouncements">See more</button>
                                          </div>
                                      </div>
                                  </div>
                                  @foreach($announcements as $announcement)
                                  @if($announcement == $announcements->first())
                                    @continue
                                  @else
                                  <div class="item">
                                      <div class="box">
                                          <div class="box-header with-border text-center">
                                              <h4>{{$announcement->title}}</h4>
                                          </div>
                                            <div class="box-body text-center">
                                              <div style="width:70%; margin-left:15%;">
                                                  <p>{{$announcement->description}}</p>
                                              </div>
                                          </div>

                                          <div class="box-footer text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#seeMoreAnnouncements">See more</button>
                                          </div>
                                      </div>
                                  </div>
                                  @endif
                                  @endforeach
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#seeMoreAnnouncements">See more</button>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.item -->
            </div>
            <!-- /.carousel-inner -->

            <!-- Controls -->
            <a class="left carousel-control" href="#home-slider" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left text-blue" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
            <a class="right carousel-control" href="#home-slider" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right text-blue" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
        </div>
        <!-- /.home-slider -->
    </div>
    <!-- /.slider -->
</div>
<!-- /.col -->


<div class="col-md-6 ">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#cabanatuan" data-toggle="tab">Cabanatuan</a></li>
            <li><a href="#sanJose" data-toggle="tab">San Jose</a></li>
        </ul>
        <div class="tab-content">
            <div class="active tab-pane" id="cabanatuan">
                <div class="box">
                    <div class="box-header">
                        <h4>Van Queue Cabanatuan</h4>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <table class="table table-bordered dataTable text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Plate No.</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>

                            <tr>
                                <td><i class="fa fa-star text-yellow"></i> 1</td>
                                <td>MMM-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>NNN-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>OOO-123</td>
                                <td>ER</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>PPP-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>QQQ-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>RRR-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>SSS-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>TTT-123</td>
                                <td>OB</td>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="sanJose">
                <div class="box">
                    <div class="box-header">
                        <h4>Van Queue San Jose</h4>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered dataTable text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Plate No.</th>
                                    <th>Remark</th>
                                </tr>
                            </thead>

                            <tr>
                                <td><i class="fa fa-star text-yellow"></i> 1</td>
                                <td>MMM-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>NNN-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>OOO-123</td>
                                <td>ER</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>PPP-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>QQQ-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>RRR-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>SSS-123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>TTT-123</td>
                                <td>OB</td>
                            </tr>
                        </table>

                            <table class="table table-bordered dataTable text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Plate No.</th>
                                        <th>Remark</th>
                                    </tr>
                                </thead>
                                @foreach($trips as $trip)
                                <tr>
                                    <td>
                                      @if($trip->queueId == 1 || $trip->queueId == 2 )
                                        <i class="fa fa-star text-yellow"></i>
                                      @endif
                                        {{$trip->queueId}}
                                    </td>
                                    <td>{{$trip->plate_number}}</td>
                                    <td>{{$trip->remarks}}</td>
                                </tr>
                                @endforeach
                            </table>

                            <!-- /.control-sidebar-menu -->

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs -->
</div>
<!-- /.col -->


        <div class="modal fade" id="seeMoreAnnouncements">
            <div class="modal-dialog" style="margin-top:150px;">
                <div class="col-md-offset-2 col-md-8">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> Announcement Title</h4>
                </div>
                <!-- /.modal-header -->
                <div class="modal-body row" style="margin: 0% 1%;">
                    <p style="font-size: 110%;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, rem, atque! Eaque aut aperiam doloribus ad magnam suscipit molestias itaque, adipisci velit officiis eligendi magni saepe cupiditate distinctio quos, sint.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat voluptatem debitis amet rerum nihil, officia delectus. Inventore vero, odio asperiores harum numquam modi tenetur atque voluptatem mollitia in fugiat saepe!</p>
                </div>
                <!-- /.modal-body -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@endsection
