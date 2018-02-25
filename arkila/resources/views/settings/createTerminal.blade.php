@extends('layouts.form')
@section('title', 'Create New Terminal')
@section('back-link', '#')
@section('form-action', '#')
@section('form-title', 'Create Terminal')
@section('form-body')

       <div class="form-group">
        <label>Terminal Name:</label>
        <input type="text" class="form-control" name="addTerminalName">
      </div>

@endsection
@section('form-btn')
<a href="" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Create</a>
@endsection

@section('modal-title','Alert')
@section('modal-body')
<p>Are you sure you want to create *insert terminal name* as a terminal?</p>
@endsection

@section('modal-btn')
<a href="" type="button" class="btn btn-primary">Yes</a>
<button class="btn btn-default" data-dismiss="modal">No</button>
@endsection
