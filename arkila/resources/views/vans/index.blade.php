@extends('layouts.master') 
@section('title', 'List of Van') 
@section('content-header', 'List of Van Units')

@section('content')
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
    	<div class="col-md-6">
    		<a href="" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Create Van</a>
    	</div>
        <table id="van" class="table table-bordered table-striped">
            <thead>
                <tr>
				    <th>Plate Number</th>
				    <th>Driver</th>
				    <th>Operator</th>
				    <th>Model</th>
				    <th>Seating Capacity</th>
				    <th>Actions</th>
				</tr>
            </thead>
            <tbody>
                @foreach($vans as $van)
						<tr>
							<td>{{$van->plate_number}}</td>
							<td>
							{{ $van->driver()->first()->full_name ?? $van->driver()->first() }}
							</td>
							<td>{{ $van->operator()->first()->full_name }}</td>
							<td>{{$van->model}}</td>
							<td>{{$van->seating_capacity}}</td>
							<td>
								<div class="text-center">
									<form method="POST" action="{{route('vans.destroy',[$van->plate_number])}}">
									{{csrf_field()}}
									{{method_field('DELETE')}}
		                            <a href="home/vans/{{$van->plate_number}}" class="btn btn-primary"><i class="fa fa-eye"></i>View</a>
		                            <a href="/home/vans/{{$van->plate_number}}/edit" class="btn btn-info"><i class="fa fa-pencil-square-o"></i>Edit</a>

									<button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
								</form>
		                        </div>
							</td>
						</tr>
					@endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 
@section('scripts') 
@parent

<script>
    $(function() {
        $('#van').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })
</script>

@stop