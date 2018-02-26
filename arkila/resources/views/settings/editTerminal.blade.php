@extends('layouts.form')
@section('title', 'Edit Terminal')
@section('back-link')
@section('form-action', route('terminal.update', [$terminal->terminal_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'Edit Terminal')
@section('form-body')

	@include('message.error')
	
    <div class="form-group">
        <label>Terminal Name:</label>
        <input type="text" class="form-control" name="editTerminalName" value="{{$terminal->terminals}}">
    </div>

@endsection
@section('form-btn')
<a href="" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Save Changes</a>
@endsection

@section('modal-title','Alert')
@section('modal-body')
<p>Are you sure you want to create *insert Decription* as a discount?</p>
@endsection

@section('modal-btn')
<button type="submit" class="btn btn-primary">Yes</a>
<button class="btn btn-primary" data-dismiss="modal">No</button>
@endsection

@section('scripts')
@parent

@endsection
