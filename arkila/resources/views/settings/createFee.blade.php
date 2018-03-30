@extends('layouts.form')
@section('title', 'Create New Fee')
@section('back-link', route('settings.index'))
@section('form-action', route('fees.store'))
@section('form-title', 'CREATE FEE')
@section('form-body')

    <div class="form-group">
        <label>Description: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="addFeesDesc" maxlength="30" required>
    </div>
    <div class="form-group">
        <label>Amount: <span class="text-red">*</span></label>
        <input type="number" class="form-control" name="addFeeAmount" step="0.25" min="1" max="5000" placeholder="Php 0.00" required>
    </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Create</button>
@endsection