@extends('layouts.form')
@section('title', 'Create New Discount')
@section('back-link', route('settings.index'))
@section('form-action', route('discounts.store'))
@section('form-title', 'CREATE DISCOUNT')
@section('form-body')
				  
<div class="form-group">

    <label>Description: <span class="text-red">*</span></label>
    <input type="text" class="form-control" name="addDiscountDesc" val-settings-desc required>
</div>
<div class="form-group">
    <label>Amount: <span class="text-red">*</span></label>
    <input type="number" class="form-control" name="addDiscountAmount" step="0.25" placeholder="Php 0.00" val-settings-amount required>
</div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Create</button>
@endsection
