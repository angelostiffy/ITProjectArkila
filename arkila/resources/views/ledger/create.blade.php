@extends('layouts.form')
@section('title', 'Add Daily Revenue/Expense')
@section('form-title', 'Add Daily Revenue/Expense')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
@stop
@section('content')
@section('form-body')
@section('form-action', route('ledger.store'))

          
<div class="form-group">
    <label for="payor">Payee/Payor:</label>
    <input type="text" class="form-control" name="payor">
</div>
<div class="form-group">
    <label for="Particulars">Particulars:</label>
    <input type="text" class="form-control" name="particulars">
</div>
<div class="form-group">
    <label for="or">OR#:</label>
    <input type="text" class="form-control" name="or">
</div>
<div class="form-group">
    <label for="amount">Amount:</label>
    <input type="text" class="form-control" name="amount">
</div>
<div class="form-group" name="revenueExpense">

<div class="form-group">
    <label>
        <input type="radio" name="r1" class="minimal" value="Revenue">
            Revenue
    </label>
    <label>
        <input type="radio" name="r1" class="minimal" value="Expense">
            Expense
    </label>
</div>
    
@endsection
@section('form-btn')     
   <button type="submit" class="btn btn-success" data-dismiss="modal">Submit</button>
   <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>

@endsection

@section('scripts')
@parent

@endsection