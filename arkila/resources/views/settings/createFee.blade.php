@extends('layouts.form')
@section('title', 'Create New Fee')
@section('back-link', URL::previous())
@section('form-action', route('fees.store'))
@section('form-title', 'Create Fee')
@section('form-body')

    <div class="form-group">
        <div style="margin-top:18%">
            @include('message.error')
        </div>
        <label>Description:</label>
        <input type="text" class="form-control" name="addFeesDesc">
    </div>
    <div class="form-group">
        <label>Amount:</label>
        <input type="number" class="form-control" name="addFeeAmount" step="0.25" min="0" placeholder="Php 0.00">
    </div>

@endsection
@section('form-btn')
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Create</a>
@endsection

@section('modal-title','Alert')
@section('modal-body')
    <p>Are you sure you want to add this Fee?</p>
@endsection

@section('modal-btn')
    <button type="submit" class="btn btn-primary">Yes</button>
    <button class="btn btn-primary" data-dismiss="modal">No</button>
@endsection
