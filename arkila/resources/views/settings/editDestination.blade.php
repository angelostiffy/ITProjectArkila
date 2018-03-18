@extends('layouts.form')
@section('title', 'Edit Destination')
@section('back-link', URL::previous())
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
        <label>Fare:</label>
        <input type="number" class="form-control" name="editDestinationFare" step = "0.25" min="50"  max="5000" value="{{$destination->amount}}" required>
     </div>

@endsection
@section('form-btn')
    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-modal" data-keyboard="true">Save Changes</a>
@endsection

@section('modal-title','Confirm')
@section('modal-body')
    <p>Are you sure you want to overwrite the changes?</p>
@endsection

@section('modal-btn')
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" style="width:33%;">Submit</button>
@endsection
