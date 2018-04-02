@extends('layouts.form')
@section('title', 'Add Revenue/Expense')
@section('form-title', 'Add Revenue/Expense')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
@stop
@section('content')
@section('form-body')
@section('form-action', route('ledger.store'))
@section('back-link', route('ledger.index'))


@include('message.error')
<div class="form-group">
    <label for="payor">Payee/Payor:</label>
    <input type="text" class="form-control" name="payor" value="{{ old('payor') }}">
</div>
<div class="form-group">
    <label for="Particulars">Particulars: <span class="text-red">*</span></label>
    <input type="text" class="form-control" name="particulars" value="{{ old('particulars') }}" required>
</div>
<div class="form-group">
    <label for="or">OR#:</label>
    <input type="text" class="form-control" name="or" value="{{ old('or') }}">
</div>
<div class="form-group">
    <label>Amount: <span class="text-red">*</span></label>
    <input type="number" class="form-control" name="amount" step="0.25" placeholder="Php 0.00" value="{{ old('amount') }}" required>
</div>

<div class="form-group" name="revenueExpense">
    <div class="radio">
        <div class="col-md-6">
            <label for=""> Revenue</label>
            <label class="radio-inline">
                <input type="radio" name="type" class="flat-blue" value="Revenue" @if(old('type') == 'Revenue') {{'checked'}}@endif>
            </label>
        </div>
        <div class="col-md-6">
            <label for="">Expense</label>
            <label class="radio-inline">
                <input type="radio" name="type" class="flat-blue" value="Expense" @if(old('type') == 'Expense') {{'checked'}}@endif>
            </label>
        </div>
    </div>
</div>

@endsection
@section('form-btn')
   <button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>

@endsection
