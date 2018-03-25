@extends('layouts.form')
@section('title', 'Create New Destination')
@section('back-link', route('settings.index'))
@section('form-action', route('destinations.store'))
@section('form-title', 'Create Destination')
@section('form-body')
                 
    <div class="form-group">
        <label>Destination: <span class="text-red">*</span></label>
        <input name="addDestination" type="text" class="form-control" maxlength="30" required>
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
        <label>Fare: <span class="text-red">*</span></label>
        <input type="number" class="form-control" name="addDestinationFare" step="0.25" placeholder="Php 0.00"  min="1" max="5000" required>
    </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Create</button>
@endsection

