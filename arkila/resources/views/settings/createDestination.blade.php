@extends('layouts.form')
@section('title', 'Create New Destination')
@section('back-link', '#')
@section('form-action')
@section('form-title', 'Create Destination')
@section('form-body')
                  <div class="form-group">
                    <label>Destination:</label>
                    <input type="text" class="form-control">
                  </div>
                   <div class="form-group">
                    <label>Terminal:</label>
                    <select class= "form-control" name="addDestinationTerminal" >
                      <option value="">Cabanatuan City Terminal</option>
                      <option value="">San Jose City Terminal</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Fare:</label>
                    <input type="number" class="form-control" name="addDestinationFare"  step="0.25" min="0" placeholder="Php 0.00">
                </div>
@endsection
@section('form-btn')
<a href="" class="btn btn-primary">Create</a>
@endsection

@section('modal-title','Alert')
@section('modal-body')
<p>Are you sure you want to create *insert Destination name* for *insert Terminal* ?</p>
@endsection

@section('modal-btn')
<a href="" type="button" class="btn btn-primary">Yes</a>
<button class="btn btn-primary" data-dismiss="modal">No</button>
@endsection