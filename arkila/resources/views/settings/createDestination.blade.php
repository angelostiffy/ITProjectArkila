@extends('layouts.form')
@section('title', 'Create New Destination')
@section('back-link', URL::previous())
@section('form-action', route('destinations.store'))
@section('form-title', 'Create Destination')
@section('form-body')
                  <div class="form-group">
                    <label>Destination:</label>
                    <input name="addDestination" type="text" class="form-control">
                  </div>
                   <div class="form-group">
                    <label>Terminal:</label>
                    
                    <select class= "form-control" name="addDestinationTerminal" >
                      @foreach($terminals as $terminal)
                      <option value="{{$terminal->terminal_id}}">{{$terminal->description}}</option>
                      @endforeach
                    </select>
                    
                  </div>
                  <div class="form-group">
                    <label>Fare:</label>
                    <input type="number" class="form-control" name="addDestinationFare"  step="0.25" min="0" placeholder="Php 0.00">
                </div>
@endsection
@section('form-btn')
<a href="" data-toggle="modal" data-target="#form-modal" class="btn btn-primary">Create</a>
@endsection

@section('modal-title','Alert')
@section('modal-body')
<p>Are you sure you want to create *insert Destination name* for *insert Terminal* ?</p>
@endsection

@section('modal-btn')
<button type="submit" type="button" class="btn btn-primary">Yes</a>
<button class="btn btn-primary" data-dismiss="modal">No</button>
@endsection