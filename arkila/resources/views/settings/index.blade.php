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