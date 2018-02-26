@extends('layouts.master')
@section('title', 'Rent Van')
@section('content-header', 'Rent Van')
@section('content')
  <section class="content"> 
  <form method="POST" action="/home/rental/getSummary">
          {{csrf_field()}}            
        <input type="hidden" name="type" value="Walk-in">

        <h3 class="box-title">Rent Van</h3>
          <div class="box box-primary">
            <div class="box-body">
                <h3>Personal Information</h3>
              <div class="row">
                <div class="col-md-4">
                  Last Name:<input type="text" name="lastName" class="form-control" placeholder="Last Name">
                    Contact Number:<input type="text" name="contactNumber" class="form-control" placeholder="Contact Number">
                    Number of Days:<input class="form-control" type="number" name="numberOfDays" placeholder="Number of Days">
                       </div>
                <div class="col-md-4">
                  First Name:<input type="text" name="firstName" class="form-control" placeholder="First Name">
                    Destination:<input type="text" name="destination" class="form-control" placeholder="Destination">
                    Departure Date: 
                    <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date" class="form-control pull-right" id="datepicker">
                </div>
                </div>
                <div class="col-md-4">
                  Middle Name:<input type="text" name="middleName" class="form-control" placeholder="Middle Name">
                    Type of Van: 
                     <select class = "form-control" name="vanType">
                      <option value="volvo">Toyota Hiace</option>
                      <option value="saab">Nissan Urvan</option>
                    </select> 
                    
                    <div class="bootstrap-timepicker">
                <div class="form-group">
                  Departure Time:
                  <div class="input-group">
                    <input type="text" name="time" class="form-control" id = "timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
                </div>  
              </div>
            </div>
            <!-- /.box-body -->
          </div>
             <button class="btn btn-success "><i class="fa fa-angle-right"></i> Next</button>        
</form>
            </section>

@endsection
@section('scripts')
@parent
<script>
  $(function () {
    
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

  })
    $(function () {
    
    //Date picker
    $('#timepicker').timepicker({
      showInputs:false
    })

  })
</script>
@endsection