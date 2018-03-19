@extends('layouts.form')
@section('title', 'Edit Fee')
@section('back-link', URL::previous())
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
        <input type="number" class="form-control" name="editFeeAmount" step = "0.25" min="1" max="5000" value="{{$fee->amount}}">
    </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Save Changes</button>
@endsection
