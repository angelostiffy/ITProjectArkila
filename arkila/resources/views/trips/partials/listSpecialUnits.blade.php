@foreach($trips as $trip)
    <li class="">
        <span class="list-border">
            <div class="row">
        <div class="col-xs-6">
        <h4 class="pull-left">
            {{$trip->plate_number}}
            
        </h4>

        <div class="col-xs-6">
            <div class="pull-right">
                <i class="badge badge-pill badge-default ">{{$trip->remarks}}</i>
                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" style="border-radius: 100%;">
                    <i class="fa fa-gear"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">On Deck</a></li>
                    <li><a href="#">Remove</a></li>
                </ul>
            </div>
        </div>
        </div>
        </span>
    </li>
    @endforeach