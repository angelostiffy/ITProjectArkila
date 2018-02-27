@extends('layouts.form')
@section('title', 'Manange Users')
@section('form-title', 'Manage Account')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
  @stop
@section('content')
@section('form-body')
          
  <div class="form-group">
    <label for="payor">User name:</label>
    <span>Span</span>
  </div>
  <div class="form-group">
    <label for="Particulars">Name:</label>
    <span>Yuki Marfil</span>
  </div>
  <div class="form-group">
    <label for="Particulars">Email Address:</label>
    <span>yuki@grkngc.com</span>
  </div>

  <div>
  <button type="button" class="btn btn-danger" data-dismiss="modal">Reset Password</button> </div>                 

                   
@endsection
@section('form-btn')     
   <button type="button" class="btn btn-primary" data-dismiss="modal">Save Changes</button>
   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

@endsection

@section('scripts')
@parent

@endsection