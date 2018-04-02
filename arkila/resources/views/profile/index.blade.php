@extends('layouts.form')
@section('title', 'Edit Profile')
@section('form-title', 'EDIT PROFILE')
@section('form-body')
                 
    <div class="form-group">
        <label>Current Password:</label>
        <input name="password" type="password" class="form-control">
    </div>
    <div class="form-group">
        <label>New Password:</label>
        <input name="password_confirmation" type="password" class="form-control">
    </div>
    <div class="form-group">
        <label>Confirm Password:</label>
        <input name="password_confirmation" type="password" class="form-control">
    </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Save Changes</button>
@endsection

