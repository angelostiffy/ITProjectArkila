@extends('layouts.form')
@include('message.error')
@section('title', 'Edit Discount')
@section('back-link', URL::previous())
@section('form-action', route('discounts.update', [$discount->fad_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'Edit Discount')
@section('form-body')
	<div>
	 	<label for="description">Description:</label>
	 	<p>{{$discount->description}}</p>
	 </div>

    <div class="form-group">
        <label>Amount:</label>
        <input type="number" class="form-control" name="editDiscountAmount" step = "0.25" min="0" value="{{$discount->amount}}">
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