@extends('layouts.form')
@section('title', 'Create New Discount')
@section('back-link', route('settings.index'))
@section('form-action', route('discounts.store'))
@section('form-title', 'Create Discount')
@section('form-body')
				  
<div class="form-group">
    <div style="margin-top:18%">
        @include('message.error')
    </div>

    <label>Description: <span class="text-red">*</span></label>
    <input type="text" class="form-control" name="addDiscountDesc" required>
</div>
<div class="form-group">
    <label>Amount: <span class="text-red">*</span></label>
    <input type="number" class="form-control" name="addDiscountAmount" step="0.25" min="1" max="5000" placeholder="Php 0.00" required>
</div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Create</button>
@endsection
