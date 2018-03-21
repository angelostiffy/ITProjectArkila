@extends('layouts.form')
@section('title', 'Create New Ticket')
@section('back-link', URL::previous())
@section('form-action', route('tickets.store'))
@section('form-title', 'Create Ticket')
@section('form-body')
                 
    <div class="form-group">


        <label>Description: <span class="text-red">*</span></label>
        <input value='{{old('description')}}' name="description" type="text" class="form-control" maxlength="5" required>
    </div>
    <div class="form-group">
        <label>Terminal:</label>

        <select class="form-control" name="terminal">
          @foreach($terminals as $terminal)
            <option @if(old('terminal') == $terminal->terminal_id) {{'selected' }}@endif value="{{$terminal->terminal_id}}">{{$terminal->description}}</option>
          @endforeach
        </select>

    </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Create</button>
@endsection

