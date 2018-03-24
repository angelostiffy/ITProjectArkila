@extends('layouts.form')
@section('title', 'Edit Daily Revenue/Expense')
@section('form-title', 'Edit Daily Ledger')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
@stop
@section('content')
@section('form-body')
<div class="form-group">
    <label for="payor">Payee/Payor:</label>
    <input type="text" class="form-control" id="payor">
</div>
<div class="form-group">
    <label for="Particulars">Particulars:</label>
    <input type="text" class="form-control" id="particulars">
</div>
<div class="form-group">
    <label for="or">OR#:</label>
    <input type="text" class="form-control" id="or">
</div>
<div class="form-group">
    <label for="amount">Amount:</label>
    <input type="text" class="form-control" id="amount">
</div>
<div class="form-group" id="revenueExpense">

<div class="form-group">
    <label>
      <input type="radio" name="r1" class="minimal">
        Revenue
    </label>
    <label>
      <input type="radio" name="r1" class="minimal">
        Expense
    </label>

</div>
    
@endsection
@section('form-btn')
    
    <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
    
@endsection

@section('scripts')
@parent

@endsection