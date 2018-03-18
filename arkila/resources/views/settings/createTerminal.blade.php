@extends('layouts.form')
@section('title', 'Create New Terminal')
@section('back-link', URL::previous())
@section('form-action', route('terminal.store'))
@section('form-title', 'Create Terminal')
@section('form-body')
	
    <div class="form-group">
        
        <div style="margin-top:18%">
            @include('message.error')
        </div>

        <div class="form-group">
            <label>Terminal Name:</label>
            <input type="text" class="form-control" name="addTerminalName" maxlength="30" required>
        </div>
        <div class="form-group">
            <label>Booking Fee:</label>
            <input type="number" class="form-control" step="0.25" name="bookingFee" required>
        </div>
    </div>

@endsection
@section('form-btn')
    <a  class="btn btn-primary" data-keyboard="true" data-toggle="modal" data-target="#form-modal" id="modalSubmit">Create</a>
@endsection

@section('modal-title','Confirm')
@section('modal-body')
    <p>Are you sure you want to create this terminal?</p>
@endsection

@section('modal-btn')
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" style="width:33%;">Submit</button>
@endsection

@section('scripts') 
@parent

    <script>
        $(document).keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                $('#form-modal').modal('toggle');
            }
        });   
    </script>

@endsection
