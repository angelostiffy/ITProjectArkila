@extends('layouts.form')
@section('title', 'Edit Fee')
@section('back-link')
@section('form-action', '#')
@section('form-title', 'Edit Fee')
@section('form-body')

    <div class="form-group">
        <label>Amount:</label>
        <input type="number" class="form-control" name="editFeeAmount" step = "0.25" min="0">
    </div>

@endsection
@section('form-btn')
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Save Changes</button>
@endsection

@section('modal-title')

@section('modal-body')
@endsection

@section('modal-btn')
@endsection

@section('scripts')
@parent

@endsection
