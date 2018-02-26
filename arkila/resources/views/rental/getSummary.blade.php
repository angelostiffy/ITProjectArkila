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
          @foreach ($rentDetails as $data)
          <div class="box-body">
            <p>First Name: {{ $data[0] }}</p>
            <p>Middle Name: {{ $data[1] }}</p>
            <p>Last Name: {{ $data[2] }}</p>
            <p>Contact Number: {{ $data[3] }}</p>
            <p>Destination: {{ $data[4] }}</p>
            <p>Number of Days: {{ $data[5] }}</p>
            <p>Departure Date: {{ $data[6] }}</p>
            <p>Departure Time: {{ $data[7] }}</p>
            @endforeach
              <div class = "col-md-6">
            <a href="/home/rental/create" class="btn btn-info"><i class="fa fa-angle-left"></i> Back</a>
              </div>
            <button class="btn btn-success"><i class="fa fa-send"></i> Submit</button>
              </div>
            </div>
        </div>    
      </section>

@endsection