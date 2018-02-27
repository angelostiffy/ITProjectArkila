@extends('layouts.form')
@include('message.error')
@section('title', 'Edit Fee')
@section('back-link')
@section('form-action', route('fees.update', [$fee->fad_id]))
@section('method_field', method_field('PATCH'))
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