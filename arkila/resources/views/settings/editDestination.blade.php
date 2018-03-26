@extends('layouts.form')
@section('title', 'Edit Destination')
@section('back-link', route('settings.index'))
@section('form-action', route('destinations.update', [$destination->destination_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'Edit Destination')
@section('form-body')
	@include('message.error')

	 <div>
	 	<label for="destination">Description:</label>
	 	<p>{{$destination->description}}</p>
	 </div>

     <div class="form-group">
        <label>Fare:<span class="text-red">*</span></label>
        <input type="number" class="form-control" name="editDestinationFare" step = "0.25" min="50"  max="5000" value="{{$destination->amount}}" required>
     </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Save Changes</button>
@endsection
