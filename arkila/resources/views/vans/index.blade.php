@extends('layouts.master')






@section('content')
          <h2>Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
				    <tr>
				      <th>Plate Number</th>
				      <th>Driver</th>
				      <th>Operator</th>
				      <th>Model</th>
				      <th>Seating Capacity</th>
				    </tr>
              </thead>
              <tbody>
                 
					@foreach($vans as $van)

						<tr>
							<td>{{$van->plate_number}}</td>
							<td>{{$van->members->where('role','Driver')->first()->full_name ?? $van->members->where('role','Driver')->first()}}</td>
							<td>{{$van->members->where('role','Operator')->first()->full_name}}</td>
							<td>{{$van->model}}</td>
							<td>{{$van->seating_capacity}}</td>
							<td><a href="/home/vans/{{$van->plate_number}}/edit"><button>Edit</button></a></td>
							<td><form method="POST" action="/home/vans/{{$van->plate_number}}">
									{{csrf_field()}}
									{{method_field('DELETE')}}
									<button>Delete</button>
								</form>
							</td>
						</tr>
					@endforeach
					
              </tbody>
            </table>
          </div>
@endsection