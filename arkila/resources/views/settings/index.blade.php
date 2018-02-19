@extends('layouts.app')
@section('content')
	<div class="col-xl-6">
		<div class="nav-tabs-custom">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab">Destinations</a></li>
             	<li><a href="#tab_2" data-toggle="tab">Discounts</a></li>
             	<li><a href="#tab_3" data-toggle="tab">Revenues</a></li>
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
									<a href="/home/settings/{{ $destination->destination_id }}">Edit</a>
                                		<form action="{{ route('settings.destroy', [$destination->destination_id]) }}" method="POST">
                                 			{{ csrf_field() }}
                                 			<input type="hidden" name="_method" value="DELETE">
                                 			<button>Delete</button>\
                                 		</form>
								</td>
							</tr>
							@endforeach
						</tbody>
            		</table>
            	</div>
            	<div class="tab-pane active" id="tab_2">
            		
            	</div>
            	<div class="tab-pane active" id="tab_3">
            		<table class="table table-striped table-bordered table-list">
						<thead>
							<tr>
								<th>Revenue</th>
								<th>Amount</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td></td>
							</tr>
						</tbody>
            		</table>	
            	</div>
            </div>	
		</div>
	</div>
@endsection