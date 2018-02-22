@extends('layouts.master')
@section('title', 'index')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css"> 
@stop

@section('content')


<section class="content">
     
<h3 class="box-title">Add Van</h3>

  <div class="box box-primary"  >
    <div class="box-body"  >
        <h3>Van Information</h3>
      <div class="row">
        <div class="col-md-5">
          Plate Number:<input type="text" class="form-control fixVanForm" placeholder="Last Name">


      <div class="form-group">
        Driver's Name
        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
          <option selected="selected">Alabama</option>
          <option>Alaska</option>
          <option>California</option>
          <option>Delaware</option>
          <option>Tennessee</option>
          <option>Texas</option>
          <option>Washington</option>
        </select>

            Van's Model<input type="text" class="form-control" placeholder="First Name">
            Seating Capacity<input type="number" class="form-control" placeholder="Address" max="15" min="1">


      </div>
      <div id="buttonsCenter">
          <button type="submit" class="btn btn-primary">Add Driver</button>
         <button type="submit" class="btn btn-primary">Clear</button>
        </div>



      </div>
    </div>
    <!-- /.box-body -->
  </div>


  </div>

</section>

@endsection