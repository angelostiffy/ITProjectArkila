@extends('layouts.forms')
@section('title', 'Edit Destination')
@section('back-link')
@section('form-title', 'Add Destination')
@section('form-body')

     <div class="form-group">
        <label>Fare:</label>
        <input type="number" class="form-control" step = "0.25" min="0">
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
