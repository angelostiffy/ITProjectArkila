@extends('layouts.form')
@section('title', 'Create New Fee')
@section('back-link', '#')
@section('form-action', '#')
@section('form-title', 'Create Fee')
@section('form-body')
                  <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" name="addFeeDesc">
                  </div>
                  <div class="form-group">
                    <label>Ammount:</label>
                    <input type="number" class="form-control" name="addFeeAmount" step="0.25" min="0" placeholder="Php 0.00">
                </div>
@endsection
@section('form-btn')
<a href="" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Create</a>
@endsection

@section('modal-title','Alert')
@section('modal-body')
<p>Are you sure you want to add *insert Description* as a fee?</p>
@endsection

@section('modal-btn')
<a href="" type="button" class="btn btn-primary">Yes</a>
<button class="btn btn-primary" data-dismiss="modal">No</button>
@endsection
