@extends('layouts.form')
@section('title', 'Edit Destination')
@section('back-link', '/home/settings')
@section('form-action', route('destinations.update', [$destination->destination_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'Edit Destination')
@section('form-body')
	 <div>
	 	<label for="destination">Description:</label>
	 	<p>{{$destination->description}}</p>
	 </div>

     <div class="form-group">
        <label>Fare:</label>
        <input type="number" class="form-control" name="editDestinationFare" step = "0.25" min="0" value="{{$destination->amount}}">
     </div>

@endsection
@section('form-btn')
 <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Save Changes</a>
@endsection

@section('modal-title','Alert')
@section('modal-body')
<p>Are you sure you want to change the fare of *insert Description* ?</p>
@endsection

@section('modal-btn')
<button type="submit" class="btn btn-primary">Yes</button>
<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
@endsection
