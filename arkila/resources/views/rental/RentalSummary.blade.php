@extends('layouts.master')
@section('title', 'Rental Summary')
@section('content-header', 'Rental Summary')
@section('content')
 <section class="content">   
        <div class = "col-md-12">
    <div class="box box-default" align = "center">
          <div class="box-header with-border">
            <h3 class="box-title">Rental Summary</h3>
          </div>
          <div class="box-body">
            <p>First Name: Marlou</p>
            <p>Middle Name: Ford</p>
            <p>Last Name: Caballar</p>
            <p>Contact Number: 09176541786</p>
            <p>Destination: Manila</p>
            <p>Number of Days: 3</p>
            <p>Departure Date: 02-23-2018</p>
            <p>Departure Time: 1:00 PM</p>
              
              <div class = "col-md-6">
            <button class="btn btn-info"><i class="fa fa-angle-left"></i> Back</button>
              </div>
            <button class="btn btn-success"><i class="fa fa-send"></i> Submit</button>
              </div>
            </div>
        </div>    
      </section>

@endsection