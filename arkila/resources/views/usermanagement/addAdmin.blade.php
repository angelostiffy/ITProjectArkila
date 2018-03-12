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
    <div style="margin-top:18%">
        @include('message.error')
    </div>
    
    <div class="form-group">
        <label for="uName">Username:</label>
        <input type="text" class="form-control" name="userName" maxlength="15" required>
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" name="fullName" maxlength="50" required>
    </div>
    <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" class="form-control" name="userEmail">
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="Password" class="form-control" name="password" required>
    </div>
    <div class="form-group">
        <label for="cPassword">Confirm Password:</label>
        <input type="Password" class="form-control" name="password_confirmation" required>
    </div>
    <div class="form-group">
        <label for="terminal">Terminal:</label>
        <select class="form-control" id="terminal" name="addUserTerminal">
        @foreach($terminals as $terminal)
            <option value="{{$terminal->terminal_id}}">{{$terminal->description}}</option>
        @endforeach
        </select>
    </div>
    
    @section('form-btn')     
        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Register</button>
    @endsection
    
    @section('modal-title','Confirm')
    @section('modal-body')
        <p>Are you sure you want to create this terminal?</p>
    @endsection

    @section('modal-btn')
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" style="width:33%;">Submit</button>
    @endsection

</div>             
@endsection
@endsection


