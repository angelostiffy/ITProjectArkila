@extends('layouts.form')
@section('title', 'Edit Terminal')
@section('back-link') {{route('settings.index')}} @endsection
@section('form-action', route('terminal.update', [$terminal->terminal_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'Edit Terminal')
@section('form-body')

    <div class="form-group">
        <div class="form-group">
            <label>Terminal Name:</label>
            <input type="text" class="form-control" name="editTerminalName"  maxlength="30" value="{{$terminal->description}}">
        </div>
        <div class="form-group">
            <label for="">Booking Fee:</label>
            <input class="form-control" type="number" step="0.25" name="editBookingFee" value="{{$terminal->booking_fee}}" min="1" max="5000">
        </div>
    </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Save Changes</button>
@endsection

