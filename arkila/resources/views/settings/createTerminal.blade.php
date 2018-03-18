@extends('layouts.form')
@section('title', 'Create New Terminal')
@section('back-link', URL::previous())
@section('form-action', route('terminal.store'))
@section('form-title', 'Create Terminal')
@section('form-body')
	
    <div class="form-group">
        <div class="form-group">
            <label>Terminal Name: <span class="text-red">*</span> </label>
            <input type="text" class="form-control" name="addTerminalName" maxlength="30" required="">
        </div>
        <div class="form-group">
            <label>Booking Fee: <span class="text-red">*</span> </label>
            <input type="number" class="form-control" step="0.25" name="bookingFee" min="1" max="5000" required>
        </div>
    </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Create</a>
@endsection
