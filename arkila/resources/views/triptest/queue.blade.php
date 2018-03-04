@extends('layouts.master')

@section('title','Van Queue')

@section('links')
  @parent
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


      .rectangle-list a{
      position: relative;
      display: block;
      padding: .4em .4em .4em .8em;
      *padding: .4em;
      margin: .5em 0 .5em 2.5em;
      background: #ddd;
      color: #444;
      text-decoration: none;
      transition: all .3s ease-out;   
  }

  .rectangle-list a:hover{
      background: #eee;
  }   

  .rectangle-list a:before{
      content: counter(li);
      counter-increment: li;
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

  .rectangle-list li:first-child a:before{
      background: #02ea6e;
  }

  

  .rectangle-list a:after{
      position: absolute; 
      content: '';
      border: .5em solid transparent;
      left: -1em;
      top: 50%;
      margin-top: -.5em;
      transition: all .3s ease-out;               
  }

  .rectangle-list a:hover:after{
      left: -.5em;
      border-left-color: #fa8072;             
  }

  .rectangle-list li:first-child a:hover:after{
      border-left-color: #02ea6e;
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
  }

  body.dragging, body.dragging * {
  cursor: move !important;
}

.dragged {
  position: absolute;
  opacity: 0.5;
  z-index: 2000;
}

ol.example li.placeholder {
  position: relative;
  /** More li styles **/
}
ol.example li.placeholder:before {
  position: absolute;
  /** Define arrowhead **/
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
              </div>
              <form action="">
              <div class="box-body">
                    
                      <label for="">Van Unit</label>
                      <select name="" id="" class="form-control">
                          <option value="">AAA-123</option>
                          <option value="">AAA-1234</option>
                       </select>
                       <label for="">Driver</label>
                      <select name="" id="" class="form-control">
                          <option value=""></option>
                          <option value=""></option>
                          <option value=""></option>
                          <option value=""></option>
                          <option value=""></option>
                      </select>
              </div>
              <div class="box-footer">
                  <div class="pull-right">
                      <button class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add to Queue</button>
                  </div>
              </div>
              </form>
            </div>
        </div>
<div id='connected'>
        <div class="col-md-5">
          <!-- Van Queue Box -->
          <div class="box box-primary">
            <div class="box-header">
              </h3 class="box-title">Van Queue</h3>
            </div>
            <div class="box-body">
                <pre id="serialize_output"></pre>

                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

                <ol id ="queue" class="rectangle-list limited_drop_targets">
                  @foreach ($trips as $trip)
                  <li>
                    <a href="">{{ $trip->van->plate_number }}
                    <span class="badge badge-warning badge-pill">
                    {{ $trip->remarks }}
                    </span>
                    </a> 
                  </li>
                  @endforeach
                  <!-- <li><a href="">BBB</a></li>
                  <li><a href="">CCC</a></li>
                  <li><a href="">DDD</a></li>
                  <li><a href="">EEE</a></li>
                  <li><a href="">FFF</a></li>
                  <li><a href="">GGG</a></li>
                  <li><a href="">HHH
                  <span class="badge badge-error badge-pill pull-right">ER</span>
                  </a></li>
                  <li><a href="">III</a></li>
                  <li><a href="">JJJ</a></li> -->
                </ol>
            </div>
          </div>
        </div>
               
         <div class="col-md-4">
          <!-- Special Unit -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Special Unit</h3>
            </div>
            <div class="box-body">
                <pre id="serialize_output"></pre>

                <ol id = "special" class="rectangle-list limited_drop_targets">
                  <li>
                    <a href="">AAA
                    <span class="badge badge-warning badge-pill">
                    CC
                    </span>
                    </a> 
                    <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  </li>
                  <li><a href="">BBB</a></li>
                  <li><a href="">CCC</a></li>
                  <li><a href="">DDD</a></li>
                  <li><a href="">EEE</a></li>
                  <li><a href="">FFF</a></li>
                  
                </ol>
              </div>
             </div>
        </div>
      </div>
        </div>
@endsection

@section('scripts')
  @parent
  <script src="{{ URL::asset('/js/jquery-sortable.js') }}"></script>
    <!-- List sortable -->
    <script>
      var group = $("ol.limited_drop_targets").sortable({
        group: 'limited_drop_targets+',
        isValidTarget: function  ($item, container) {
          if($item.is(".highlight"))
            return true;
          else
            return $item.parent("ol")[0] == container.el[0];
        },
        onDrop: function ($item, container, _super) {
          $('#serialize_output').text(
            group.sortable("serialize").get().join("\n"));
          _super($item, container);
                   },
        serialize: function (parent, children, isContainer) {
          return isContainer ? children.join() : parent.text();
        },
        tolerance: 6,
        distance: 10,
      });
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
