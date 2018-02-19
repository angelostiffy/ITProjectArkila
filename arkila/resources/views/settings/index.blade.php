@extends('layouts.app')
@section('content')
	<div class="col-xl-6">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab">Destinations</a></li>
             	<li><a href="#tab_2" data-toggle="tab">Fees</a></li>
             	<li><a href="#tab_3" data-toggle="tab">Discounts</a></li>
			</ul>
			<div class="tab-content">
            	<div class="tab-pane active" id="tab_1">
					<table class="table table-striped table-bordered table-list">
						<thead>
							<tr>
								<th>Destination</th>
								<th>Terminal</th>
								<th>Amount</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($destinations as $destination)
							<tr>
								<td>{{ $destination->description }}</td>
								<td>{{ $destination->terminal }}</td>
								<td>{{ $destination->amount }}</td>
								<td>
									<button data-toggle="modal" data-target="#modalEditDestination"> Edit </button>
									<div class="modal fade" id="modalEditDestination" tabindex="-1" role="dialog" 
								     aria-labelledby="myModalLabel" aria-hidden="true">
								    <div class="modal-dialog">
								        <div class="modal-content">
								            <!-- Modal Header -->
								            <div class="modal-header">
								                <button type="button" class="close" 
								                   data-dismiss="modal">
								                       <span aria-hidden="true">&times;</span>
								                       <span class="sr-only">Close</span>
								                </button>
								                <h4 class="modal-title" id="myModalLabel">
								                    Modal title
								                </h4>
								            </div>
								            
								            <!-- Modal Body -->
								            <div class="modal-body">
								                
								                <form class="form-horizontal" role="form">
								                  <div class="form-group">
								                    <label  class="col-sm-2 control-label"
								                              for="inputEmail3">Email</label>
								                    <div class="col-sm-10">
								                        <input type="email" class="form-control" 
								                        id="inputEmail3" placeholder="Email"/>
								                    </div>
								                  </div>
								                  <div class="form-group">
								                    <label class="col-sm-2 control-label"
								                          for="inputPassword3" >Password</label>
								                    <div class="col-sm-10">
								                        <input type="password" class="form-control"
								                            id="inputPassword3" placeholder="Password"/>
								                    </div>
								                  </div>
								                  <div class="form-group">
								                    <div class="col-sm-offset-2 col-sm-10">
								                      <div class="checkbox">
								                        <label>
								                            <input type="checkbox"/> Remember me
								                        </label>
								                      </div>
								                    </div>
								                  </div>
								                  <div class="form-group">
								                    <div class="col-sm-offset-2 col-sm-10">
								                      <button type="submit" class="btn btn-default">Sign in</button>
								                    </div>
								                  </div>
								                </form>
								                
								                
								                
								                
								                
								                
								            </div>
								            
								            <!-- Modal Footer -->
								            <div class="modal-footer">
								                <button type="button" class="btn btn-default"
								                        data-dismiss="modal">
								                            Close
								                </button>
								                <button type="button" class="btn btn-primary">
								                    Save changes
								                </button>
								            </div>
								        </div>
								    </div>
								</div>
									<!-- <a href="/home/settings/{{ $destination->destination_id }}">Edit</a>
                                		<form action="{{ route('settings.destroy', [$destination->destination_id]) }}" method="POST">
                                 			{{ csrf_field() }}
                                 			<input type="hidden" name="_method" value="DELETE">
                                 			<button>Delete</button>\
                                 		</form> -->
								</td>
							</tr>
							@endforeach
						</tbody>
            		</table>
            	</div>
			</div>
			<div class="tab-content">
            	<div class="tab-pane active" id="tab_2">
					<table class="table table-striped table-bordered table-list">
						<thead>
						<tr>
							<th>Description</th>
							<th>Amount</th>
						</tr>
						</thead>
						<tbody>
						@foreach($fees as $fee)
							<tr>
								<td>{{ $fee->description }}</td>
								<td>{{ $fee->amount }}</td>
								<td>
									<a href="/home/settings/fees/{{ $fee->fad_id }}/edit">Edit</a>
									<form action="/home/settings/fees/{{$fee->fad_id}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
										<button>Delete</button>
									</form>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
            	</div>
			</div>
			<div class="tab-content">
            	<div class="tab-pane active" id="tab_3">
                    <table class="table table-striped table-bordered table-list">
                        <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($discounts as $discount)
                            <tr>
                                <td>{{ $discount->description }}</td>
                                <td>{{ $discount->amount }}</td>
                                <td>
                                    <a href="/home/settings/discounts/{{ $discount->fad_id }}/edit">Edit</a>
                                    <form action="/home/settings/discounts/{{$discount->fad_id}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <button>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            	</div>
            </div>	
		</div>
	</div>
@endsection