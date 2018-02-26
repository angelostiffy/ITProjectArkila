@extends('layouts.forms')
@section('title', 'Add Discount')
@section('back-link', '#')
@section('form-title', 'Add Discount')
@section('form-body')
                  <div class="form-group">
                    <label>Description:</label>
                    <input type="text" class="form-control" name="addDiscountDesc" >
                  </div>
                  <div class="form-group">
                    <label>Ammount:</label>
                    <input type="number" class="form-control" name="addDiscountAmount" step="0.25" min="0" placeholder="Php 0.00">
                </div>
@endsection
@section('form-btn')
<a href="" class="btn btn-primary" data-toggle="modal" data-target="#form-modal"><i class="fa fa-plus-circle"></i> Add</button>
@endsection

@section('modal-title')

@section('modal-body')
@endsection

@section('modal-btn')
@endsection

@section('scripts')
@parent

@endsection
