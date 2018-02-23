@extends('layouts.form')
@section('title', 'Edit Destination')
@section('back-link')
@section('form-action', '#')
@section('form-title', 'Add Destination')
@section('form-body')

     <div class="form-group">
        <label>Fare:</label>
        <input type="number" class="form-control" name="editDestinationFare" step = "0.25" min="0">
     </div>

@endsection
@section('form-btn')
 <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Save Changes</a>
@endsection

@section('modal-title')

@section('modal-body')
@endsection

@section('modal-btn')
@endsection

@section('scripts')
@parent

@endsection
