@extends('layouts.form')
@section('title', 'Edit Discount')
@section('back-link', route('settings.index'))
@section('form-action', route('discounts.update', [$discount->fad_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'EDIT DISCOUNT')
@section('form-body')
	
	<div>
	 	<label for="description">Description:</label>
	 	<p class="info-container">{{$discount->description}}</p>
	 	<input type="hidden" name="editDiscountDesc" value='{{$discount->description}}' required>
	 </div>

    <div class="form-group">
        <label>Amount: <span class="text-red">*</span></label>
        <input type="number" class="form-control" name="editDiscountAmount" step = "0.25" value="{{$discount->amount}}" val-settings-amount required>
    </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Save Changes</button>
@endsection
