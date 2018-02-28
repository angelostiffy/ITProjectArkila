@extends('layouts.form')
@section('title', 'Add Administrator')
@section('back-link', URL::previous())
@section('form-action', route('admin.store'))
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
  @stop
@section('content')
@section('form-body')
          
                    @include('message.error')
                    <div class="form-group">
                      <label for="uName">User name:</label>
                      <input type="text" class="form-control" name="userName" required>
                    </div>
                    <div class="form-group">
                      <label for="name">Name:</label>
                      <input type="text" class="form-control" name="fullName" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Email Address:</label>
                      <input type="text" class="form-control" name="userEmail">
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
                    
@endsection
@section('form-btn')     
   <button type="submit" class="btn btn-success" data-dismiss="modal">Register</button>
   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

@endsection

@section('scripts')
@parent

@endsection