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

@section('modal-title')

@section('modal-body')
@endsection

@section('modal-btn')
@endsection

@section('scripts')
@parent

@endsection
