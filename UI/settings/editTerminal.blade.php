@extends('layouts.forms')
@section('title', 'Edit Terminal')
@section('back-link')
@section('form-title', 'Edit Terminal')
@section('form-body')

    <div class="form-group">
        <label>Terminal Name:</label>
        <input type="text" class="form-control">
    </div>

@endsection
@section('form-btn')
 <button type="button" class="btn btn-primary">Save Changes</button>
@endsection

@section('modal-title')

@section('modal-body')
@endsection

@section('modal-btn')
@endsection

@section('scripts')
@parent

@endsection
