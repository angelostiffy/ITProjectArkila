@extends('layouts.app')
@section('content')
<section class="content-header">
	<div class="col-xl-6">
<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab">Destinations</a></li>
             	<li><a href="#tab_2" data-toggle="tab">Fees</a></li>
             	<li><a href="#tab_3" data-toggle="tab">Discounts</a></li>
			</ul>
			<div class="tab-content">
			    <div class="active tab-pane" id="tab_1">
					<button data-toggle="modal" data-target="#myModalHorizontal">
					    &#43;
					</button>
					<!-- Modal -->
					<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
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
					                    Add Destination
					                </h4>
					            </div>
					            <form class="form-horizontal" action="/home/settings/destinations" role="form" method="POST">
					            {{ csrf_field() }}
					            <!-- Modal Body -->
					            <div class="modal-body">  
					                  <div class="form-group">
					                    <label  class="col-sm-2 control-label"
					                              for="destination">Destination</label>
					                    <div class="col-sm-10">
					                        <input type="text" class="form-control" 
					                        name="destination" placeholder="Destination"/>
					                    </div>
					                  </div>
					                  <div class="form-group">
					                    <label class="col-sm-2 control-label"
					                          for="terminal" >Terminal</label>
					                    <div class="col-sm-10">
					                        <input type="text" class="form-control"
					                            name="terminal" placeholder="Terminal"/>
					                    </div>
					                  </div>
					                  <div class="form-group">
					                    <label class="col-sm-2 control-label"
					                          for="Amount" >Amount</label>
					                    <div class="col-sm-10">
					                        <input type="number" class="form-control"
					                            name="amount" placeholder="Amount"/>
					                    </div>
					                  </div>
					                					                
					            </div>
					            <!-- Modal Footer -->
					            <div class="modal-footer">
					                <button type="button" class="btn btn-default"
					                        data-dismiss="modal">
					                            Close
					                </button>
					                	<button type="submit" class="btn btn-primary"> Save </button>
					            </div>
					            </form>
					        </div>
					    </div>
					</div>

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
									<button data-toggle="modal" data-target="#modalEdit">Edit</button>
									<!-- Modal -->
									<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" 
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
									                    Edit Destination
									                </h4>
									            </div>
									            <form class="form-horizontal" action="/home/settings/destinations/{{ $destination->destination_id }}" role="form" method="POST">
									            {{ csrf_field() }}
									            {{ method_field('PATCH')}}
									            <!-- Modal Body -->
									            <div class="modal-body">  
									                  <div class="form-group">
									                    <label  class="col-sm-2 control-label"
									                              for="destination">Destination</label>
									                    <div class="col-sm-10">
									                        <input type="text" class="form-control" 
									                        name="destination" placeholder="Destination" value="{{ $destination->description }}"/>
									                    </div>
									                  </div>
									                  <div class="form-group">
									                    <label class="col-sm-2 control-label"
									                          for="terminal" >Terminal</label>
									                    <div class="col-sm-10">
									                        <input type="text" class="form-control"
									                            name="terminal" placeholder="Terminal" value="{{ $destination->terminal }}"/>
									                    </div>
									                  </div>
									                  <div class="form-group">
									                    <label class="col-sm-2 control-label"
									                          for="Amount" >Amount</label>
									                    <div class="col-sm-10">
									                        <input type="number" class="form-control"
									                            name="amount" placeholder="Amount" value="{{ $destination->amount }}"/>
									                    </div>
									                  </div>					                
									            </div>
									            <!-- Modal Footer -->
									            <div class="modal-footer">
									                <button type="button" class="btn btn-default"
									                        data-dismiss="modal">
									                            Close
									                </button>
									                	<button type="submit" class="btn btn-primary"> Save </button>
									            </div>
									            </form>
									        </div>
									    </div>
									</div>

									<form action="/home/destinations/{{$destination->destination_id}}" method="POST">
		                                 {{ csrf_field() }}
		                                             {{method_field('DELETE')}}
		                                <button>Delete</button> 
		                            </form>
								</td>
							</tr>
							@endforeach
						</tbody>
            		</table>

				</div>
			    <div class="tab-pane" id="tab_2">
					<table class="table table-striped table-bordered table-list">
						<thead>
							<tr>
								<th>Destination2</th>
								<th>Terminal</th>
								<th>Amount</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
            		</table>

				</div>
			    <div class="tab-pane" id="tab_3">
					<table class="table table-striped table-bordered table-list">
						<thead>
							<tr>
								<th>Destination3</th>
								<th>Terminal</th>
								<th>Amount</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
            		</table>

			</div>

			</div>
            	</div>
            	</div>
            </section>
@endsection