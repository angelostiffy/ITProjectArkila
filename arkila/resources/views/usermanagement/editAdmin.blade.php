@extends('layouts.form')
@section('title', 'Add Daily Revenue/Expense')
@section('form-title', 'Register Admin')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
  @stop
@section('content')
@section('form-body')
          
                    <div class="form-group">
                      <label for="payor">User name:</label>
                      <input type="text" class="form-control" id="uName">
                    </div>
                    <div class="form-group">
                      <label for="Particulars">Name:</label>
                      <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                      <label for="Particulars">Email Address:</label>
                      <input type="text" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                      <label for="or">Password:</label>
                      <input type="Password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                      <label for="amount">Confirm Password:</label>
                      <input type="Password" class="form-control" id="cPassword">
                    </div>
                    
@endsection
@section('form-btn')     
   <button type="button" class="btn btn-success" data-dismiss="modal">Register</button>
   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

@endsection

@section('scripts')
@parent

@endsection