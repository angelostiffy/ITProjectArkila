@extends('layouts.form')
@section('title', 'Create New Discount')
@section('back-link', '#')
@section('form-action', route('discounts.store'))
@section('form-title', 'Create Discount')
@section('form-body')
                  <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" name="addDiscountDesc" >
                  </div>
                  <div class="form-group">
                    <label>Amount:</label>
                    <input type="number" class="form-control" name="addDiscountAmount" step="0.25" min="0" placeholder="Php 0.00">
                </div>
@endsection
@section('form-btn')
<a href="" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Create</a>
@endsection

@section('modal-title','Alert')
@section('modal-body')
<p>Are you sure you want to create *insert Decription* as a discount?</p>
@endsection

@section('modal-btn')
<button type="submit" class="btn btn-primary">Yes</a>
<button class="btn btn-primary" data-dismiss="modal">No</button>
@endsection