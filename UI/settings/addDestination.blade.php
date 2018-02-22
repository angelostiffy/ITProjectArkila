@extends('layouts.forms')
@section('title', 'Add Destination')
@section('back-link')
@section('form-title', 'Add Destination')
@section('form-body')
                  <div class="form-group">
                    <label>Destination:</label>
                    <input type="text" class="form-control">
                  </div>
                   <div class="form-group">
                    <label>Terminal:</label>
                    <select name="" id="" class= "form-control">
                      <option value="">Cabanatuan City Terminal</option>
                      <option value="">San Jose City Terminal</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Fare:</label>
                    <input type="number" class="form-control" step = 0.25 min=0 placeholder="Php 0.00">
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
