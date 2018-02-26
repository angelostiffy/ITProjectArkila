@extends('layouts.form')
@section('title', 'Edit Fee')
@section('back-link')
@section('form-action', '#')
@section('form-title', 'Edit Fee')
@section('form-body')

	<div>
	 	<label for="description">Description:</label>
	 	<p>{{$fee->description}}</p>
	</div>

    <div class="form-group">
        <label>Amount:</label>
        <input type="number" class="form-control" name="editFeeAmount" step = "0.25" min="0" value="{{$fee->amount}}">
    </div>

@endsection
@section('form-btn')
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Save Changes</button>
@endsection

@section('modal-title','Alert')
@section('modal-body')
<p>Are you sure you want to change the fee of *insert Description* ?</p>
@endsection

@section('modal-btn')
<a href="" type="button" class="btn btn-primary">Yes</a>
<button class="btn btn-default" data-dismiss="modal">No</button>
@endsection