@extends('layouts.driver') @section('title', 'Driver Home') @section('content-title', 'Driver Home') @section('content')
<div class="col-md-6 ">

    <div class="slider">
        <!-- {{!! json_encode($announcements) !!}} -->
        <div id="home-slider" class="carousel slide box-trip" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item  active">
                    <div class="box">
                        {{!! json_encode($announcements)!!}}
                        <div class="box-header with-border text-center">
                            <h4>{{$announcements->first()->title}}</h4>
                        </div>
                        <div class="box-body text-center">
                            <div style="width:70%; margin-left:15%;">
                                <p>{{$announcements->first()->description}}</p>
                            </div>
                        </div>

                        <div class="box-footer text-center">
                          <button type="button" class="see-more btn btn-primary"
                          data-toggle="modal" data-target="#seeMoreAnnouncements"
                          data-title="{{$announcements->first()->title}}"
                          data-announcement="{{$announcements->first()->description}}">
                            See more
                          </button>
                        </div>
                    </div>
                </div>
                @foreach($announcements as $announcement) @if($announcement == $announcements->first()) @continue @else
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
                            <button type="button" class="see-more btn btn-primary"
                            data-toggle="modal" data-target="#seeMoreAnnouncements"
                            data-title="{{$announcement->title}}"
                            data-announcement="{{$announcement->description}}">
                              See more
                            </button>
                        </div>
                    </div>
                </div>
                @endif @endforeach
            </div>
            <!-- /.carousel-innder -->
        </div>
        <!-- /.home-slider -->
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
    <!-- /.slider -->
</div>
<!-- /.col -->





<div class="col-md-6 ">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          @php $terminalName = null; @endphp
          @foreach($terminals as $key => $value)
          @php $terminalName[$key] = strtolower(preg_replace('/\s*/', '', $value->description)); @endphp
            <li @if($key == 0) {{ 'class=active' }} @endif><a href="#{{$terminalName[$key]}}" data-toggle="tab">{{$value->description}}</a></li>

          @endforeach
        </ul>
        <div class="tab-content">
          @php $counter = 0; @endphp
          @foreach($terminals as $key => $value)
            <div class="@if($key == 0) {{'active'}} @endif tab-pane" id="{{$terminalName[$counter]}}">
                <div class="box">
                    <div class="box-header">
                        <h4>Van Queue {{$value->description}}</h4>
                        {{!! json_encode($trips)!!}}
                    </div>
                    <div class="box-body">
                      {{'pogi'}}
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
                                @if($trip->terminaldesc == $terminal->description)
                                <td>
                                    @if($trip->queueId == 1 || $trip->queueId == 2 )
                                    <i class="fa fa-star text-yellow"></i> @endif {{$trip->queueId}}
                                </td>
                                <td>{{$trip->plate_number}}</td>
                                <td>{{$trip->remarks}}</td>
                                @endif
                            </tr>

                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            @php $counter++; @endphp
            @endforeach
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
                    <h4 class="announcement-title"></h4>
                </div>
                <!-- /.modal-header -->
                <div class="modal-body row" style="margin: 0% 1%;">
                    <p class="announcement-body" style="font-size: 110%;"></p>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function (){
  $('.see-more').click(function(){
    $('.announcement-title').text($(this).data('title'));
    $('.announcement-body').text($(this).data('announcement'));
  });

  var data;
  $.ajax({
    url: "{{URL::route('drivermodule.viewQueue')}}",
    dataType: "json",
    success: function(resp){
      data = resp.trips;
      console.log(data);
    }
  });

  $.ajax({
    url: "{{URL::route('drivermodule.viewAnnouncement')}}",
    dataType: "json",
    success: function(resp){
      data = resp.announcements;
      console.log(data);
    }
  });
});

</script>

@endsection
