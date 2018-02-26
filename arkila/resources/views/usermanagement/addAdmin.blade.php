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
                      <label for="uName">User name:</label>
                      <input type="text" class="form-control" id="uName">
                    </div>
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email Address:</label>
                      <input type="text" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="Password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                      <label for="cPassword">Confirm Password:</label>
                      <input type="Password" class="form-control" id="cPassword">
                    </div>
                    <div class="form-group">
                      <label for="terminal">Terminal:</label>
                      <select class="form-control" id="terminal">
                        <option>1</option>
                        <option>2</option>
                      </select>
                    </div>
                    
@endsection
@section('form-btn')     
   <button type="button" class="btn btn-success" data-dismiss="modal">Register</button>
   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

@endsection

@section('scripts')
@parent

@endsection