@extends('layouts.master')
@section('title', 'index')
@section('content')
<section class="content">
          <div id="ledgerInfo" class="box">
            <!-- /.box-header -->
            <name id="ledgerDate" style="font-size: 13pt">March 23, 2018</name>
            <a href="#" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addExpRev">
                Add <span class="glyphicon glyphicon-plus-sign"></span> 
            </a>
              
            <div id="addExpRev" class="modal fade" role="dialog">
              <div id="tripModal" class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Revenue/Expense</h4>
                  </div>
                  <div class="modal-body">
                  
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
                        
                        
                    </div>
                   
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </div>

              </div>
            </div>         
              
              
              
              

            <div class="box-body">
              <table id="dailyLedgerTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Payee/Payor</th>
                  <th>Particulars</th>
                  <th>OR#</th>
                  <th>IN</th>
                  <th>OUT</th>
                  <th>Balance</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Chabal loves shaina</td>
                  <td>Booking Fee</td>
                  <td>039501</td>
                  <td>500</td>
                  <td></td>
                  <td>500</td>
                    <td class="center-block">
                        <div class="center-block">
                             <button class="btn btn-info" data-toggle="modal" data-target="#editExpRev"><i class="glyphicon glyphicon-pencil"> Edit </i></button>
                             <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</i></button>
                        </div>
                    </td>
                        <div id="editExpRev" class="modal fade" role="dialog">
                          <div id="tripModal" class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Revenue/Expense</h4>
                              </div>
                              <div class="modal-body">

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
                                      <input type="radio" name="r1" class="minimal" >
                                        Revenue
                                    </label>
                                    <label>
                                      <input type="radio" name="r1" class="minimal">
                                        Expense
                                    </label>

                                </div>    
                                    
                                    
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                              </div>
                              </div>         
                </tr>
                
                </tbody>
              </table>
            
              <button type="button" class="btn btn-primary">Update Report</button>
              <button type="button" class="btn btn-danger">Delete Report</button>
              
            </div>
            <!-- /.box-body -->
          </div>
</section>
@endsection