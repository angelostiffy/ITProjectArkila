@extends('layouts.master')
@section('title', 'index')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
  @stop
@section('content')

        <div class="box box-primary"  >
            <div class="box-body"  >
                <h3>Van Information</h3>
              <div class="row">
                <div class="col-md-5">
                  Plate Number:<input type="text" class="form-control fixVanForm" placeholder="Last Name">
                
               Seating Capacity<input type="number" class="form-control" placeholder="Address" max="15" min="1">
              <div id="buttonsCenter">
                   <button type="submit" class="btn btn-primary">Clear</button>
                  <button type="submit" class="btn btn-success">Add Van</button>
              
                </div>
              
                
                
              </div>
            </div>
            <!-- /.box-body -->
          </div>


          </div>
          
         

@endsection

@section('scripts')
@parent

@endsection