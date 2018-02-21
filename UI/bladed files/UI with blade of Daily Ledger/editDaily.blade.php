@extends('layouts.master')
@section('title', 'Edit Daily Revenue/Expense')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
  @stop
@section('content')

           <div class="login-box">
  <div class="login-logo">
    <h1>  <span><a href="../dailyLedger.html"s><i class="fa fa-arrow-circle-left"></i></a></span> Edit Revenue/Expense</h1>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      
    <form action="" method="post">
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
                    <div class="form-group" id="revenueExpense" > 
                    
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
                         <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
    </form>



  </div>
  <!-- /.login-box-body -->
</div>

@stop

@section('scripts')
@parent

@stop