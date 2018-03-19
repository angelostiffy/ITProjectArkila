@extends('layouts.form')
@section('title', 'Add Administrator')
@section('back-link', URL::previous())
@section('form-action', route('admin.store'))
@section('form-title', 'Add Admin')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
  
@stop
@section('content')
@section('form-body')
          
<div class="form-group">

    <div class="form-group">
        <label for="uName">Username: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="userName" maxlength="15" required>
    </div>
    <div class="form-group">
        <label for="name">Name: <span class="text-red">*</span></label>
        <input type="text" class="form-control" name="fullName" maxlength="50" required>
    </div>
    <div class="form-group">
        <label for="email">Email Address: <span class="text-red">*</span></label>
        <input type="email" class="form-control" name="userEmail">
    </div>
    <div class="form-group">
        <label for="password">Password: <span class="text-red">*</span></label>
        <input type="Password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
        <label for="cPassword">Confirm Password:<span class="text-red">*</span></label>
        <input type="Password" class="form-control" name="password_confirmation" required>
    </div>
    <div class="form-group">
        <label for="terminal">Terminal: <span class="text-red">*</span></label>
        <select class="form-control" id="terminal" name="addUserTerminal">
        @foreach($terminals as $terminal)
            <option value="{{$terminal->terminal_id}}">{{$terminal->description}}</option>
        @endforeach
        </select>
    </div>
    
    @section('form-btn')     
        <button type="submit" class="btn btn-primary">Register</button>
    @endsection
 
@endsection


