@extends('layouts.form')
@section('title', 'Create New Destination')
@section('back-link', URL::previous())
@section('form-action', route('destinations.store'))
@section('form-title', 'Create Destination')
@section('form-body')
                 
    <div class="form-group">

        <div style="margin-top:18%">
            @include('message.error')
        </div>

        <label>Destination:</label>
        <input name="addDestination" type="text" class="form-control" maxlength="30">
    </div>
    <div class="form-group">
        <label>Terminal:</label>

        <select class="form-control" name="addDestinationTerminal">
          @foreach($terminals as $terminal)
            <option value="{{$terminal->terminal_id}}">{{$terminal->description}}</option>
          @endforeach
        </select>

    </div>
    <div class="form-group">
        <label>Fare:</label>
        <input type="number" class="form-control" name="addDestinationFare" step="0.25" placeholder="Php 0.00" min="1" max="200">
    </div>

@endsection
@section('form-btn')
    <a href="" data-toggle="modal" data-target="#form-modal" class="btn btn-primary">Create</a>
@endsection

@section('modal-title','Confirm')
@section('modal-body')
    <p>Are you sure you want to add this destination?</p>
@endsection

@section('modal-btn')
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" style="width:33%;">Submit</button>
@endsection