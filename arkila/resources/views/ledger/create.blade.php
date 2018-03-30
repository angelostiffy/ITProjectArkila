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
    <label for="Particulars">Particulars:</label>
    <input type="text" class="form-control" name="particulars" value="{{ old('particulars') }}">
</div>
<div class="form-group">
    <label for="or">OR#:</label>
    <input type="text" class="form-control" name="or" value="{{ old('or') }}">
</div>
<div class="form-group">
    <label for="amount">Amount:</label>
    <input type="text" class="form-control" name="amount" value="{{ old('amount') }}">
</div>
<div class="form-group" name="revenueExpense">

<div class="form-group">
    <label>
        <input type="radio" name="type" class="minimal" value="Revenue" @if(old('type') == 'Revenue') {{'checked'}}@endif>
            Revenue
    </label>
    <label>
        <input type="radio" name="type" class="minimal" value="Expense" @if(old('type') == 'Expense') {{'checked'}}@endif>
            Expense
    </label>
</div>
    
@endsection
@section('form-btn')     
   <button type="submit" class="btn btn-primary" data-dismiss="modal">Submit</button>

@endsection

