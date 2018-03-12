<li class="" data-plate="+trips[0].plate_number+" data-remark="+trips[0].remarks+">
                            <span class="dropped">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="queuenum">
                                  <a href="" id="queue+trips[0].trip_id+" name="+trips[0].plate_number+" data-type="select" data-title="Queue number" class="queue-editable">+trips[0].plate_number+</a>
                                </div>

                                <p>
                                  <a href="" ><i class="fa fa-map-marker inline"></i></a>
                                    {{ $trip->van->plate_number }}
                                </p>
                              </div>
                              <div class="col-md-6">
                                <div class="pull-right">
                                  <a href="" id="remark{{ $trip->trip_id}}" name="{{$trip->van->plate_number}}"  data-type="select" data-title="Update Remark" class="remark-editable btn btn-outline-secondary btn-sm editable" data-original-title="" title="">{{ $trip->remarks }}</a>



                                  <a href="" class="" data-toggle="modal" data-target="#modal{{$trip->trip_id}}"><i class="fa fa-remove text-red"></i></a>
                                </div>
                              </div>
                            </div>
                          </span>

    <div class="modal fade" id="modal{{$trip->trip_id}}">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-yellow"><i class="fa fa-warning"></i> Alert</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <p><strong>{{$trip->van->plate_number}}</strong> will be remove from the list.</p>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{route('trips.destroy',[$trip->trip_id])}}">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Confirm</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</li>