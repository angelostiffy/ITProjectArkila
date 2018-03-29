@extends('layouts.form')
@section('title', 'Edit Daily Revenue/Expense')
@section('form-title', 'Edit Daily Ledger')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
@stop
@section('content')
@section('form-action', route('ledger.update', [$ledger->ledger_id]))
@section('method_field', method_field('PATCH'))
@section('form-body')
@section('back-link', route('ledger.index'))


<div class="form-group">
    <label for="payor">Payee/Payor:</label>
    <input type="text" class="form-control" name="payor" value="{{ $ledger->payee }}">
</div>
<div class="form-group">
    <label for="Particulars">Particulars:</label>
    <input type="text" class="form-control" name="particulars" value="{{ $ledger->description }}">
</div>
<div class="form-group">
    <label for="or">OR#:</label>
    <input type="text" class="form-control" name="or"  value="{{ $ledger->or_number }}">
</div>
<div class="form-group">
    <label for="amount">Amount:</label>
    <input type="text" class="form-control" name="amount" value="{{ $ledger->amount }}">
</div>
<div class="form-group" name="revenueExpense">

<div class="form-group">
    <label>
      <input type="radio" value="Revenue" name="type" class="minimal" @if(old('type') || $ledger->type == 'Revenue') {{ 'checked' }} @endif>
        Revenue
    </label>
    <label>
      <input type="radio" value="Expenses" name="type" class="minimal" @if(old('type') || $ledger->type == 'Expenses') {{ 'checked' }} @endif>
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