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