@extends('layouts.form')
@section('title', 'Edit Fee')
@section('back-link', route('settings.index'))
@section('form-action', route('fees.update', [$fee->fad_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'EDIT FEE')
@section('form-body')

	<div>
	 	<label for="description">Description:</label>
	 	<p class="info-container">{{$fee->description}}</p>
	 	<input type="hidden" name="editFeesDesc" value='{{$fee->description}}' required>
	</div>

    <div class="form-group">
        <label>Amount:</label>
        <input type="number" class="form-control" name="editFeeAmount" step = "0.25" value="{{$fee->amount}}" val-settings-amount>
    </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Save Changes</button>
@endsection
