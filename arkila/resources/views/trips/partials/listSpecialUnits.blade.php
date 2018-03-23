@foreach($trips as $trip)
    <li class="list-group-item">
        <h4 class="pull-left">
            {{$trip->plate_number}}
            <span class="badge badge-pill badge-default ">{{$trip->remarks}}</span>
        </h4>
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-default btn-sm btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">On Deck</a></li>
                <li><a href="#">Remove</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </li>
    @endforeach