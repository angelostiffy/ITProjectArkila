@extends('layouts.master')

@section('title','Van Queue')

@section('links')
  @parent
  <link rel="stylesheet" href="{{ URL::asset('/jquery/bootstrap3-editable/css/bootstrap-editable.css') }}">

    <style>
    
    body.dragging, body.dragging * {
  cursor: move !important;
}

.dragged {
  position: absolute;
  opacity: 0.5;
  z-index: 2000;
}

ol.vertical{
  margin: 0 0 9px 0;
  min-height: 10px;
}
  ol.vertical li{
    display: block;
    color: $linkColor;
    background: $grayLighter;
  }


  ol.vertical li.placeholder{
    position: relative;
    margin: 0;
    padding: 0;
    border: none;
  }
  ol.vertical li.placeholder:before{
      position: absolute;
      content: "";
      width: 0;
      height: 0;
      margin-top: -5px;
      right: -8px;
      top: -4px;
      border: 8px solid transparent;
      border-right-color: black;
      border-left: none;
    }



    ol {
     /* Initiate a counter */
    list-style: none; /* Remove default numbering */
    *list-style: decimal; /* Keep using default numbering for IE6/7 */
    font: 15px 'trebuchet MS', 'lucida sans';
    padding: 0;
    margin-bottom: 4em;
    text-shadow: 0 1px 0 rgba(255,255,255,.5);
    }

    ol ol {
        margin: 0 0 0 2em; /* Add some left margin for inner lists */
    }


   .rectangle-list span{
    position: relative;
    display: block;
    padding: .4em .4em .4em .8em;
    *padding: .4em;
    margin: .5em 0 .5em 2.5em;
    text-decoration: none;
    transition: all .3s ease-out;   
}

.rectangle-list span:hover{
}   

.queuenum a{
    counter-increment: li;
    position: absolute; 
    left: -2.5em;
    top: 50%;
    margin-top: -1em;
    height: 2em;
    width: 2em;
    line-height: 2em;
    text-align: center;
    font-weight: bold;
    color: black;
    background-color: #fa8072;
}

.queuenum a:hover{
  background: #eb6b5c;
  transition: all .3s ease-out;
}
.queuenum a:afters{
  position: absolute; 
    content: '';
    border: .5em solid transparent;
    left: -1em;
    top: 50%;
    margin-top: -.5em;
    transition: all .3s ease-out;
}
.queuenum a:hover:after{
    left: -.5em;
    border-left-color: #fa8072;    

}

#queue-list:first-child{
  background: yellow;
}

.special-list span {
    position: relative;
    display: block;
    padding: .4em .4em .4em .8em;
    margin: .5em 0 0 0;
    text-decoration: none;
    transition: all .3s ease-out;
}

.list-border{
    border: 1px solid #8f8685;
    border-left-width: 4px;
    background: #feb0a721;
}


  .mapm-zoom a:hover{
       transform: scale(1.2);
    transition: all .3s ease-out;
  }
  </style>
@endsection

@section('content-header','WOW')

@section('content')
      <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                  <h3 class="box-title">Add Driver to Queue</h3>

                  <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
              </div>
              <div class="box-body">
                      <label for="">Van Unit</label>
                      <select @if($vans->first() == null) {{'disabled'}} @endif name="van" id="van" class="form-control select2">
                          @if($vans->first() != null)
                              @foreach ($vans as $van)
                                <option value="{{$van->plate_number}}">{{ $van->plate_number }}</option>
                              @endforeach
                          @else
                              <option> No Available Data</option>
                          @endif
                       </select>

                       <label for="">Destination</label>
                      <select @if($terminals->first() == null) {{'disabled'}} @endif name="destination" id="destination" class="form-control">
                          @if($terminals->first() != null)
                            @foreach ($terminals as $terminal)
                                <option value="{{$terminal->terminal_id}}">{{ $terminal->description }}</option>
                            @endforeach
                          @else
                              <option> No Available Data</option>
                          @endif

                      </select>


                       <label for="">Driver</label>
                      <select @if($drivers->first() == null) {{'disabled'}} @endif name="driver" id="driver" class="form-control">
                          @if($drivers->first() != null)
                              @foreach ($drivers as $driver)
                                  <option value="{{$driver->member_id}}">{{ $driver->full_name }}</option>
                              @endforeach
                          @else
                              <option> No Available Data</option>
                          @endif
                      </select>
              </div>
                @if($vans->first() != null && $terminals->first() !=null && $drivers ->first() !=null)

                      <div class="box-footer">
                          <div class="pull-right">
                              <button id="addQueueButt" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add to Queue</button>
                          </div>
                      </div>
                @endif
              </div>
                {{-- 
            Special Unit --}}
            <div class="box box-solid">
            <div class="box-header with-border ">
              <h3 class="box-title">Special Units</h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body">
                <ol id='specialUnitList' class="special-list serialization">
                    <li class="sp-item"><span class="list-border">SSS</span></li>
                </ol>
              </div>
             </div>
        </div>

        <div class="col-md-9">
          <!-- Van Queue Box -->
          <div class="box box-solid">
            {{-- <div class="box-header  bg-blue">
              <h3 class="box-title">Queue</h3>
            </div> --}}
            <div class="box-body">
              <div class="row">
              <div class="col-md-4">
                  <div class="box box-solid">
                    <div class="box-header text-center with-border">
                      <h3 class="box-title"><i class="fa fa-location-arrow"></i> Terminals</h3>
                    </div>
                  <ul id="destinationTerminals" class="nav nav-stacked">
                    @foreach ($terminals as $terminal)
                    <li class=" @if($terminals->first() == $terminal){{'active'}} @else {{''}}@endif" data-val="{{$terminal->terminal_id}}"><a href="#{{$terminal->terminal_id}}" data-toggle="tab">{{$terminal->description}}</a></li>
                    @endforeach
                  </ul>
                  </div>
                </div>
              <div class="col-md-8">
                <div class="tab-content">
                <!-- Cabanatuan Queue Tab -->
                @foreach($terminals as $terminal)
                  <div data-val='{{$terminal->terminal_id}}' class="tab-pane @if($terminals->first() == $terminal) {{'active'}} @else {{''}} @endif" id="{{$terminal->terminal_id}}">
                    <div class="box box-primary">
                      <div class="box-header text-center ">
                        <h3 class="box-title">{{$terminal->description}}</h3>
                      </div>
                      <div class="box-body">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-search"></i></span>
                      <input type="text" id="queueSearch" class="form-control" placeholder="Search in queue" onkeyup="myFunction()">
                    </div>
                    <ol id ="queue-list" class="vertical rectangle-list serialization">
                        @foreach ($trips->where('terminal_id',$terminal->terminal_id) as $trip)
                          <li class="" data-plate="{{ $trip->van->plate_number}}" data-remark="{{ $trip->remarks }}">
                            <span id="trip{{$trip->trip_id}}" class="list-border">
                              <div class="queuenum">
                                    <a href="" id="queue{{ $trip->trip_id}}" class="queue-editable">{{ $trip->queue_number }}</a>
                                  </div>
                              <div id="item{{$trip->trip_id}}" class="row">

                                <div class="col-md-6">
                                  
                                  <p> {{ $trip->van->plate_number }} </p>


                                </div>
                                <div class="col-md-6">

                                  <div class="pull-right">
                                     <a href="" id="remark{{ $trip->trip_id}}" class="remark-editable editable btn btn-outline-info btn-xs" style="border-radius: 100%;" data-original-title="" title="">{{ $trip->remarks }}</a>

                                      {{-- <div class="btn-group">
                                        <button type="button"  class="btn btn-sm btn-primary"><i class="fa fa-map-marker mapm-zoom"></i></button>
                                      </div> --}}
                                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" style="border-radius: 100%">
                                        <i class="fa fa-gear"></i>
                                      </button>
                                      <ul class="dropdown-menu" role="menu">
                                        <li><a href="" id="destBtn{{$trip->trip_id}}" data-toggle="modal" data-target="#destination{{$trip->trip_id}}"><i class="fa fa-map-marker"></i>Change Destination</a></li>
                                        <li><a href="#" id="deleteBtn{{$trip->trip_id}}" data-toggle="modal" data-target="#delete{{$trip->trip_id}}"><i class="fa fa-trash"></i>Remove</a></li>
                                      </ul>
                                  </div>
                                </div>
                              </div>
                              <div class="" id="destitem{{$trip->trip_id}}">
                                <div class="row">
                                  <div class="col-xs-6">  
                                    <select name="" id="" class="form-control">
                                      @foreach($terminals as $terminal)
                                      <option value="">{{$terminal->description}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                  <div class="col-xs-5 pull-right">  
                                  <button class="btn btn-default btn-sm itemBtn{{$trip->trip_id}}">CANCEL</button>
                                  <button class="btn btn-primary btn-sm">CHANGE</button>
                                  </div>
                                </div>
                              </div>
                              <div class="" id="deleteitem{{$trip->trip_id}}"> 
                                <div class="row"> 
                                  <div class="col-xs-7">  
                                      <p><strong>{{ $trip->van->plate_number }}</strong> will be deleted. Do you want to continue?</p>
                                  </div>
                                  <div class="col-xs-5 pull-right">  
                                    <button class="btn btn-default btn-sm itemBtn{{$trip->trip_id}}"> CANCEL</button>
                                    <button class="btn btn-primary btn-sm"> YES</button>
                                  </div>
                                </div>
                              </div>
                            </span>
                              {{-- <div class="modal fade" id="delete{{$trip->trip_id}}">
                                  <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title">Alert</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                              
                                          </div>
                                          <div class="modal-body">
                                            <h1>
                                              <i class="fa fa-exclamation-triangle pull-left text-yellow" ></i>
                                            </h1>
                                              <p><strong>{{$trip->van->plate_number}}</strong> will be remove from the list.</p>
                                          </div>
                                          <div class="modal-footer">
                                              <form method="POST" action="{{route('trips.destroy',[$trip->trip_id])}}">
                                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  {{csrf_field()}}
                                                  {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Confirm</button>
                                              </form>
                                          </div>
                                      </div>
                                      <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                              </div> --}}
                              <!-- /.modal -->

                              

                          </li>
                        @endforeach
                    </ol>
                  </div>
                  </div>
                  </div>
                @endforeach
                    
                  </div>
              </div>
              </div>
                
          </div>
        </div>
        </div>
        @foreach ($trips as $trip)
        {{-- <div class="modal fade" id="destination{{$trip->trip_id}}">
                                  <div class="modal-dialog modal-sm">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                            <h4 class="modal-title text-center">{{$trip->van->plate_number}}</h4>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <form method="POST" action="{{route('trips.updateDestination',[$trip->trip_id])}}">
                                              {{csrf_field()}}
                                              {{method_field('PATCH')}}
                                           <ul class="list-group" style="margin-bottom: 0px">
                                             @foreach($terminals as $terminal)
                                              <li class="list-group-item">
                                                  <input type="radio" name="destination"  value="{{$terminal->terminal_id}}" class="flat-blue" @if($trip->terminal_id == $terminal->terminal_id){{'checked'}}@endif>
                                                    {{ $terminal->description }} 
                                              </li>
                                            @endforeach
                                          </ul>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-map-marker"></i> Change Destination</button>
                                          </div>
                                          </form>
                                      </div>
                                      <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                              </div>
                              <!-- /.modal --> --}}
                              @endforeach
      </div>


@endsection

@section('scripts')
  @parent

  
  <script src="{{ URL::asset('/jquery/bootstrap3-editable/js/bootstrap-editable.min.js') }}"></script>
  <script src="{{ URL::asset('/jquery/jquery-sortable.js') }}"></script>
  <script>
    $('.select2').select2();
  </script>
    <!-- List sortable -->
    <script>
        $(function() {
            specialUnitChecker();
            $('#specialUnitList').load('/listSpecialUnits/'+$('#destinationTerminals li.active').data('val'));
            $('#addQueueButt').on('click', function() {
                var destination = $('#destination').val();
                var van = $('#van').val();
                var driver = $('#driver').val();

                if( destination != "" && van != "" && driver != ""){
                    $.ajax({
                        method:'POST',
                        url: '/home/trips/'+destination+'/'+van+'/'+driver,
                        data: {
                            '_token': '{{csrf_token()}}'
                        },
                        success: function(){
                            location.reload();
                        }

                    });

                }
            });

        var group = $("ol.serialization").sortable({
        group: 'serialization',
        delay: 500,
        onDrop: function ($item, container, _super) {
          var queue = group.sortable("serialize").get();
            console.log(queue);
          var jsonString = JSON.stringify(queue, null, ' ');

          $('#serialize_output2').text(jsonString);
          _super($item, container);

          $.ajax({
            method:'POST',
            url: '{{route("trips.updateVanQueue")}}',
            data: {
                '_token': '{{csrf_token()}}',
                'vanQueue': queue
            },
            success: function(trips){
               console.log(trips);
               for(i = 0; i < trips.length; i++){
                    $('#queue'+trips[i].trip_id).editable('setValue',trips[i].queue_number);
               }
               specialUnitChecker();
            }

        });

        }
      });

        $('#destinationTerminals li').on('click',function(e){
            var terminal = $(e.currentTarget).data('val');
            $('#specialUnitList').load('/listSpecialUnits/'+terminal);
        });

    @foreach($trips as $trip)

      $('#remark{{$trip->trip_id}}').editable({
          name: "remarks",
          type: "select",
          title: "Update Remark",
        value: "@if(is_null($trip->remarks)){{'NULL'}}@else{{$trip->remarks}}@endif",
          source: [
                {value: 'NULL', text: '...'},
                {value: 'CC', text: 'CC'},
                {value: 'ER', text: 'ER'},
                {value: 'OB', text: 'OB'}
             ],
        url:'{{route('trips.updateRemarks',[$trip->trip_id])}}',
        pk: '{{$trip->trip_id}}',
        validate: function(value){
             if($.trim(value) == ""){
                    return "This field is required";
             }
        },
        ajaxOptions: {
            type: 'PATCH',
            headers: { 'X-CSRF-TOKEN': '{{csrf_token()}}' }
        },
        error: function(response) {
            if(response.status === 500) {
                return 'Service unavailable. Please try later.';
            } else {
                console.log(response);
                return response.responseJSON.message;
            }
        },
        success: function(response){
            specialUnitChecker();
            console.log(response);
            if(response.length > 0){

            }
        }
      });

    @endforeach
    @foreach($trips as $trip)
              $('#queue{{$trip->trip_id}}').editable({
                  name: 'queue',
                  value: '{{ $trip->queue_number }}',
                  type: 'select',
                  title:'Queue number',
                  url: '{{route('trips.updateQueueNumber',[$trip->trip_id])}}',
                  pk: '{{$trip->trip_id}}',
                  validate: function(value){
                      if($.trim(value) == ""){
                          return "This field is required";
                      }
                  },
                    source: [
                            @foreach($trips as $trip)
                        {value: '{{ $trip->queue_number }}', text: '{{ $trip->queue_number }}' },
                        @endforeach
                    ],
                  ajaxOptions: {
                        type: 'PATCH',
                        headers: { 'X-CSRF-TOKEN': '{{csrf_token()}}' }
                  },
                  error: function(response) {
                        if(response.status === 500) {
                            return 'Service unavailable. Please try later.';
                        } else {
                            console.log(response);
                            return response.responseJSON.message;
                        }
                  },
                  success: function(){
                      location.reload();
                  }
              });
            @endforeach

            function updateQueueList(){
                $.ajax({
                    method:'GET',
                    url: '{{route("trips.updatedQueueNumber")}}',
                    data: {
                        '_token': '{{csrf_token()}}'
                    },
                    success: function(response){
                        response.forEach(function(trip){
                            $('#queue'+trip.id).editable('setValue',trip.queueNumber);
                        });

                    }

                });
            }

            function specialUnitChecker(){
                    $.ajax({
                        method:'POST',
                        url: '{{route("trips.specialUnitChecker")}}',
                        data: {
                            '_token': '{{csrf_token()}}'
                        },
                        success: function(response){
                                if(response.length >  0){

                                }
                        }

                    });
            }

            $('a[name="onDeck"]').on('click',function(e){

                $.ajax({
                    method:'POST',
                    url: '/putOnDeck/'+$(e.currentTarget).data('val'),
                    data: {
                        '_token': '{{csrf_token()}}'
                    },
                    success: function(response){

                    }

                });

            });

        });
</script>

<script>

          function myFunction() {
                // Declare variables
                var input, filter, ol, li, span, i;
                input = document.getElementById('queueSearch');
                filter = input.value.toUpperCase();
                ol = document.getElementById('queue-list');
                li = ol.getElementsByTagName('li');

                // Loop through all list items, and hide those who don't match the search query
                for (i = 0; i < li.length; i++) {
                    span = li[i].getElementsByTagName("span")[0];
                    if (span.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }
            }
    </script>

    <script>
      $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass   : 'iradio_flat-blue'
        });
    </script>
  
  @foreach($trips as $trip)
    <script>
      $(document).ready(function(){
        $("#destitem{{$trip->trip_id}}").hide();
        $("#deleteitem{{$trip->trip_id}}").hide();
        $("#destBtn{{$trip->trip_id}}").click(function(){
            $("#item{{$trip->trip_id}}").hide();
            $("#destitem{{$trip->trip_id}}").show();
        })
        $(".itemBtn{{$trip->trip_id}}").click(function(){
            $("#destitem{{$trip->trip_id}}").hide();
            $("#deleteitem{{$trip->trip_id}}").hide();
            $("#item{{$trip->trip_id}}").show();
        })
        $("#deleteBtn{{$trip->trip_id}}").click(function(){
            $("#item{{$trip->trip_id}}").hide();
            $("#deleteitem{{$trip->trip_id}}").show();
            
        })
      });
    </script>
    @endforeach

@endsection
