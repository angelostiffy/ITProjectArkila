@extends('layouts.form')
@section('title', 'Edit Destination')
@section('back-link')
@section('form-action', '#')
@section('form-title', 'Add Destination')
@section('form-body')
	 <div>
	 	<label for="">Description:</label>
	 	<p>*insert Description*</p>
	 </div>

     <div class="form-group">
        <label>Fare:</label>
        <input type="number" class="form-control" name="editDestinationFare" step = "0.25" min="0">
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
<a href="" type="button" class="btn btn-primary">Yes</a>
<button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
@endsection
