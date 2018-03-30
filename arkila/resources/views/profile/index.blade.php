@extends('layouts.form')
@section('title', 'Edit Profile')
@section('form-title', 'EDIT PROFILE')
@section('form-body')
                 
    <div class="form-group">
        <label>Username:</label>
        <input name="" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label>Email:</label>
        <input name="" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label>Password:</label>
        <input name="" type="text" class="form-control">
    </div>
    <div class="form-group">
        <label>Reset Password:</label>
        <input name="" type="text" class="form-control">
    </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Save</button>
@endsection

