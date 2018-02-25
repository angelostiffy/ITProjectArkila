@extends('layouts.app')
@section('content')
<section class="content-header">
	<div class="col-xl-6">
<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab">Destinations</a></li>
             	<li><a href="#tab_2" data-toggle="tab">Discount</a></li>
             	<li><a href="#tab_3" data-toggle="tab">Fees</a></li>
			</ul>
			<div class="tab-content">
			    <div class="active tab-pane" id="tab_1">
					<button data-toggle="modal" class="addDestination-modal" data-target="#addDestination">
					    &#43;
					</button>
					<!-- Add Destination Modal -->
					<div class="modal fade" id="addDestination" tabindex="-1" role="dialog" 
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
					                        name="destination" placeholder="Destination" required/>
					                    </div>
					                  </div>
					                  <div class="form-group">
					                    <label class="col-sm-2 control-label"
					                          for="terminal" >Terminal</label>
					                    <div class="col-sm-10">
					                        <input type="text" class="form-control"
					                            name="terminal" placeholder="Terminal" required/>
					                    </div>
					                  </div>
					                  <div class="form-group">
					                    <label class="col-sm-2 control-label"
					                          for="Amount" >Amount</label>
					                    <div class="col-sm-10">
					                        <input type="number" class="form-control"
					                            name="amountDestination" placeholder="Amount" step="0.25" required/>
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
									<button id="buttonEditDest" class="editDestination-modal" data-toggle="modal" data-target="#editDestination" data-destid="{{$destination->destination_id}}"  data-destination="{{$destination->description}}" data-terminal="{{$destination->terminal}}" data-amount="{{$destination->amount}}">Edit</button>
									<<!--E></!--E>dit Modal for Destination-->
									<div class="modal fade" id="editDestination" tabindex="-1" role="dialog" 
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
									            <form class="form-horizontal" role="form">
									            {{csrf_field()}}
									            <!-- <input name="_method" type="hidden" value="PUT"> -->
									            <!-- Modal Body -->
									            <div class="modal-body">  
									                  <div class="form-group">
									                  	<input type="hidden" id="editDestId">
									                    <label  class="col-sm-2 control-label"
									                              for="destination">Destination</label>
									                    <div class="col-sm-10">
									                        <input type="text" class="form-control"
									                        id="editDes" name="editDes" placeholder="Destination" />
									                        <p class="errorDestination text-center alert alert-danger hidden"></p>
									                    </div>
									                  </div>
									                  <div class="form-group">
									                    <label class="col-sm-2 control-label"
									                          for="terminal" >Terminal</label>
									                    <div class="col-sm-10">
									                        <input type="text" class="form-control"
									                            id="editTerminal" name="editTerminal" placeholder="Terminal"/>
									                            <p class="errorTerminal text-center alert alert-danger hidden"></p>
									                    </div>
									                  </div>
									                  <div class="form-group">
									                    <label class="col-sm-2 control-label"
									                          for="Amount" >Amount</label>
									                    <div class="col-sm-10">
									                        <input type="number" class="form-control"
									                            id="editAmountDestination" name="editAmountDestination" placeholder="Amount" step="0.25"/>
									                            <p class="errorAmountDestination text-center alert alert-danger hidden"></p>
									                    </div>
									                  </div>					                
									            </div>
									            <!-- Modal Footer -->
									            <div class="modal-footer">
									                <button type="button" class="btn btn-default"
									                        data-dismiss="modal">
									                            Close
									                </button>
									                	<button type="submit" class="btn btn-primary editDesti"> Save </button>
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
					<button data-toggle="modal" data-target="#addDiscount">
					    &#43;
					</button>
					<!-- Modal -->
					<div class="modal fade" id="addDiscount" tabindex="-1" role="dialog" 
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
					                    Add Discount
					                </h4>
					            </div>
					            <form class="form-horizontal" action="" role="form" method="POST">
					            {{ csrf_field() }}
					            <!-- Modal Body -->
					            <div class="modal-body">  
					                  <div class="form-group">
					                    <label  class="col-sm-2 control-label"
					                              for="Discount">Discount</label>
					                    <div class="col-sm-10">
					                        <input type="text" class="form-control" 
					                        name="discount" placeholder="Dicsount" required/>
					                    </div>
					                  </div>
					                  <div class="form-group">
					                    <label class="col-sm-2 control-label"
					                          for="Amount" >Amount</label>
					                    <div class="col-sm-10">
					                        <input type="number" class="form-control"
					                            name="amountDiscount" placeholder="Amount" step="0.25"/>
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
								<th>Discount</th>
								<th>Amount</th>
								<th>Action</th>
							</tr>
						</thead>
							<tr>
								<td></td>
								<td></td>
								<td>
									<button class="editDiscount-modal" data-toggle="modal" data-target="#editDiscount">Edit</button>
									<!-- Modal -->
									<div class="modal fade" id="editDiscount" tabindex="-1" role="dialog" 
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
									                    Edit Discount
									                </h4>
									            </div>
									            <form class="form-horizontal" action="" role="form" method="POST">
									            {{ csrf_field() }}
									            {{ method_field('PATCH')}}
									            <!-- Modal Body -->
									            <div class="modal-body">  
									                  <div class="form-group">
									                    <label  class="col-sm-2 control-label"
									                              for="destination">Discount</label>
									                    <div class="col-sm-10">
									                        <input type="text" class="form-control" 
									                        name="editDiscount" placeholder="Discount" value=""/>
									                    </div>
									                  </div>
									                  <div class="form-group">
									                    <label class="col-sm-2 control-label"
									                          for="amount" >Amount</label>
									                    <div class="col-sm-10">
									                        <input type="number" class="form-control"
									                            name="editAmountDiscount" placeholder="Terminal" value="" step="0.25"/>
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

									<form action="" method="POST">
		                                 {{ csrf_field() }}
		                                             {{method_field('DELETE')}}
		                                <button>Delete</button> 
		                            </form>
								</td>
							</tr>
						<tbody>
						</tbody>
            		</table>

				</div>
			    <div class="tab-pane" id="tab_3">
			    	<button data-toggle="modal" data-target="#addFee">
					    &#43;
					</button>
					<!-- Modal -->
					<div class="modal fade" id="addFee" tabindex="-1" role="dialog" 
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
					                    Add Fee
					                </h4>
					            </div>
					            <form class="form-horizontal" action="/home/settings/destinations" role="form" method="POST">
					            {{ csrf_field() }}
					            <!-- Modal Body -->
					            <div class="modal-body">  
					                  <div class="form-group">
					                    <label  class="col-sm-2 control-label"
					                              for="destination">Fee</label>
					                    <div class="col-sm-10">
					                        <input type="text" class="form-control" 
					                        name="fee" placeholder="fee" required/>
					                    </div>
					                  </div>
					                  <div class="form-group">
					                    <label class="col-sm-2 control-label"
					                          for="Amount" >Amount</label>
					                    <div class="col-sm-10">
					                        <input type="number" class="form-control"
					                            name="amountFee" placeholder="Amount" step="0.25" required/>
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
								<th>Fees</th>
								<th>Amount</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
								<td></td>
								<td>
									<button class="editFee-modal" data-toggle="modal" data-target="#editFee">Edit</button>
									<!-- Modal -->
									<div class="modal fade" id="editFee" tabindex="-1" role="dialog" 
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
									                    Edit Fee
									                </h4>
									            </div>
									            <form class="form-horizontal" action="" role="form" method="POST">
									            {{ csrf_field() }}
									            {{ method_field('PATCH')}}
									            <!-- Modal Body -->
									            <div class="modal-body">  
									                  <div class="form-group">
									                    <label  class="col-sm-2 control-label"
									                              for="destination">Fee</label>
									                    <div class="col-sm-10">
									                        <input type="text" class="form-control" 
									                        name="editFee" placeholder="Fee" value=""/>
									                    </div>
									                  </div>
									                  <div class="form-group">
									                    <label class="col-sm-2 control-label"
									                          for="amount" >Amount</label>
									                    <div class="col-sm-10">
									                        <input type="number" class="form-control"
									                            name="editAmountFee" placeholder="Fee" value="" step="0.25"/>
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

									<form action="" method="POST">
		                                 {{ csrf_field() }}
		                                             {{method_field('DELETE')}}
		                                <button>Delete</button> 
		                            </form>
								</td>
							</tr>
						</tbody>
            		</table>

			</div>

			</div>
            	</div>
            	</div>
            </section>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
            <script>
            	//Add modal for Destinations
            	// $(document).on('click', '.addDestination-modal', function(){
            	// 	var destination = $('#destination').val();
            	// 	var terminal = $('#terminal').val();
            	// 	var amount = $('#amountDestination').val();
            	// 	$('.modal-footer').on('click', 'addDestination-modal', function(){
            	// 		$.ajax({
            	// 			type: 'POST',
            	// 			url: '/home/settings/destinations',
            	// 			data: {
            	// 				'description' : destination,
            	// 				'terminal' : terminal,
            	// 				'amount' : amount
            	// 			},
            	// 			success: function(data){
            	// 				alert('Success');
            	// 			},
            	// 			error: function(data){
            	// 				alert('Fail');
            	// 			},
            	// 		});
            	// 	});
            	// });
            	//Edit modal for Destinations
            	$(document).on('click', '.editDestination-modal', function() {
            		$('#editDestId').val($(this).data('destid'));
            		$('#editDes').val($(this).data('destination'));
            		$('#editTerminal').val($(this).data('terminal'));
            		$('#editAmountDestination').val($(this).data('amount'));
            		id = $(this).data('destid');
            		// $('#editDestination').modal('show');
            		$('.modal-footer').on('click','.editDesti', function(){
            		$.ajax({
            			type: 'PUT',
            			url: '/home/settings/destinations/' + id,
            			data: {
            				'_token': $('input[name=_token]').val(),
            				'id': $('#editDestId').val(),
            				'editDes': $('#editDes').val(),
            				'editTerminal': $('#editTerminal').val(),
            				'editAmountDestination': $('#editAmountDestination').val()
            			},
            			success: function(data){
            				//alert('Success');
            				// console.log(data);
            				$('.errorDestination').addClass('hidden');
            				$('.errorTerminal').addClass('hidden');
            				$('.errorAmountDestination').addClass('hidden');
            				
            					toastr.success('Successfully updated Destination!', 'Success Alert', {timeOut: 5000});
            				
            			},
            			error: function(data){
            				//alert('Failed');
            				setTimeout(function () {
            					$('#editDestination').modal('show');
            					toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
            				}, 500);

            				if(data.errors.description){
            					$('.errorDestination').removeClass('hidden');
            					$('.errorDestination').text(data.errors.description);
            				}

            				if(data.errors.terminal){
            					$('.errorTerminal').removeClass('hidden');
            					$('.errorTerminal').text(data.errors.terminal);
            				}

            				if(data.errors.amount){
            					$('.errorAmountDestination').removeClass('hidden');
            					$('.errorAmountDestination').text(data.errors.amount);
            				}
            			}
            			//
            		});
            	});
            	});
            	
            </script>	
@endsection