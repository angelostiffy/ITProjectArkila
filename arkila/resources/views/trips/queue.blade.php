@extends('layouts.master')

@section('title','Van Queue')

@section('links')
  @parent
  <link rel="stylesheet" href="{{ URL::asset('/jquery/bootstrap3-editable/css/bootstrap-editable.css') }}">

    <style>
    ol {
    counter-reset: li; /* Initiate a counter */
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


    .rectangle-list li{

    counter-increment: step-counter;
    position: relative;
    display: block;
    padding: .4em .4em .4em .8em;
    *padding: .4em;
    margin: .5em 0 .5em 2.5em;
    background: #ddd;
    color: #444;
    text-decoration: none;   
}

.rectangle-list li:hover{
    background: #eee;
}   

.rectangle-list li:before{
    content: counter(step-counter);
    position: absolute; 
    left: -2.5em;
    top: 50%;
    margin-top: -1em;
    background: #fa8072;
    height: 2em;
    width: 2em;
    line-height: 2em;
    text-align: center;
    font-weight: bold;
}

.rectangle-list li:after{
    position: absolute; 
    content: '';
    border: .5em solid transparent;
    left: -1em;
    top: 50%;
    margin-top: -.5em;
    transition: all .3s ease-out;               
}

.rectangle-list li:hover:after{
    left: -.5em;
    border-left-color: #fa8072;             
}   

/* SEARCH LIST; */

#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

#myUL {
    /* Remove default list styling */
    list-style-type: none;
    padding: 0;
    margin: 0;
}

#myUL li a {
    border: 1px solid #ddd; /* Add a border to all links */
    margin-top: -1px; /* Prevent double borders */
    background-color: #f6f6f6; /* Grey background color */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove default text underline */
    font-size: 18px; /* Increase the font-size */
    color: black; /* Add a black text color */
    display: block; /* Make it into a block element to fill the whole list */
}

#myUL li a:hover:not(.header) {
    background-color: #eee; /* Add a hover effect to all links, except for headers */
  </style>
@endsection

@section('content-header','WOW')

@section('content')
      <div class="row">
        <div class="col-md-3">
            <div class="box box-solid">
              <div class="box-header with-border">
                  <h3 class="box-title">Add Driver to Queue</h3>
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
                      <select @if($destinations->first() == null) {{'disabled'}} @endif name="destination" id="destination" class="form-control">
                          @if($destinations->first() != null)
                            @foreach ($destinations as $destination)
                                <option value="{{$destination->destination_id}}">{{ $destination->description }}</option>
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
                @if($vans->first() != null && $destinations->first() !=null && $drivers ->first() !=null)

                      <div class="box-footer">
                          <div class="pull-right">
                              <button id="addQueueButt" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add to Queue</button>
                          </div>
                      </div>
                @endif

            </div>
        </div>

        <div class="col-md-4">
          <!-- Van Queue Box -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">San Jose</h3>
            </div>
            <div class="box-body">

                <ol id ="queue" class="rectangle-list serialization">
                  @foreach ($trips as $trip)
                    <li data-plate="{{ $trip->van->plate_number }}" data-remark="{{ $trip->remarks }}" data-dest="Cabanatuan">
                      <div class="row">
                        <div class="col-md-5">
                          {{ $trip->van->plate_number }}
                        </div>
                      <div class="col-md-7">
                        <div class="pull-right">
                          
                          <a href="" id="bgu - 50" data-type="select" data-title="Update Remark" class="remark-editable btn btn-outline-secondary btn-sm editable" value="OB" data-original-title="" title="">{{ $trip->remarks }}</a>
                          <a href="" class="" data-toggle="modal" data-target="#modal-default"><i class="fa fa-remove"></i></a>
                        </div>
                      </div>
                    </li>
                  @endforeach
                </ol>
            </div>
          </div>
        </div>
               
         <div class="col-md-4">
          <!-- Special Unit -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Cabanatuan</h3>
            </div>
            <div class="box-body">

                <ol id = "S" class="rectangle-list serialization">
                  
                  
                </ol>
              </div>
             </div>
        </div>
      </div>
        <pre id="serialize_output2"></pre>

      <div class="modal fade" id="modal-default">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-info"></i> Alert</h4>
              </div>
              <div class="modal-body">
                <p>Will be deleted</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
@endsection

@section('scripts')
  @parent

{{--   <script>
    $('.select2').select2();
  </script> --}}
  <script src="{{ URL::asset('/jquery/bootstrap3-editable/js/bootstrap-editable.min.js') }}"></script>
  <script src="{{ URL::asset('/jquery/jquery-sortable.js') }}"></script>
    <!-- List sortable -->
    <script>
      var group = $("ol.serialization").sortable({
        group: 'serialization',
        delay: 500,
        onDrop: function ($item, container, _super) {
          var queue = group.sortable("serialize").get();

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
            success: function(vanInfo){
               console.log(vanInfo);
            }

        });

        }
      });
</script>

  <script>
    $('.remark-editable').editable({
       value: 'NULL',
        source: [
              {value: 'NULL', text: 'Give remark'},
              {value: 'CC', text: 'CC'},
              {value: 'ER', text: 'ER'},
              {value: 'OB', text: 'OB'}
           ]

    });
  </script>

<script>
      {{--$('#addQueueButt').on('click', function() {--}}
          {{--var destination = $('#destination').val();--}}
          {{--var van = $('#van').val();--}}
          {{--var driver = $('#driver').val();--}}

          {{--if( destination != "" && van != "" && driver != ""){--}}
              {{--$.ajax({--}}
                  {{--method:'POST',--}}
                  {{--url: '/home/trips/'+destination+'/'+van+'/'+driver,--}}
                  {{--data: {--}}
                      {{--'_token': '{{csrf_token()}}'--}}
                  {{--},--}}
                  {{--success: function(vanInfo){--}}
                      {{--alert(vanInfo);--}}
                  {{--}--}}

              {{--});--}}

          {{--}--}}
      {{--});--}}
    </script>

 {{--    <script>
          function myFunction() {
                // Declare variables
                var input, filter, ul, li, a, i;
                input = document.getElementById('myInput');
                filter = input.value.toUpperCase();
                ul = document.getElementById("myUL");
                li = ul.getElementsByTagName('li');

                // Loop through all list items, and hide those who don't match the search query
                for (i = 0; i < li.length; i++) {
                    a = li[i].getElementsByTagName("a")[0];
                    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        li[i].style.display = "";
                    } else {
                        li[i].style.display = "none";
                    }
                }
            }
    </script>
 --}}

@endsection
