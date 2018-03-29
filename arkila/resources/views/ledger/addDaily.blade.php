@extends('layouts.master')
@section('title', 'Create Daily Ledger')
@section('content')
 <div style="text-align: center" style class="row">
        <!-- Left col -->
    
        <p> <a href="{{route('ledger.create')}}" class="btn btn-primary btn-md" style="margin-left: 1.5%" > Create Today's Ledger </span> </a></p>
        
        <p>OR</p>
        <p>In case you didn't able to record ledger in the past days, please enter the date:</p>
        
         <!-- Date -->
          <div class="form-group">
            <label>Date:</label>

            <div class="input-group date" style="width: 18%; margin-left: 41%">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" id="datepicker">
            </div>
           </div>  
         
         <p> <a href="#" class="btn btn-primary btn-md" style="margin-left: 1.5%"> Create </span> </a></p>
          
    <!-- /.content -->
  </div>

<script>
  $(function () {
    
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

  })
</script>

@endsection