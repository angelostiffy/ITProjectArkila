@extends('layouts.form')
@section('title', 'Edit Terminal')
@section('back-link', URL::previous())
@section('form-action', route('terminal.update', [$terminal->terminal_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'Edit Terminal')
@section('form-body')

    <div class="form-group">
        
        <div style="margin-top:18%">
            @include('message.error')
        </div>
        <div class="form-group">
            <label>Terminal Name:</label>
            <input type="text" class="form-control" name="editTerminalName"  maxlength="30" value="{{$terminal->description}}" required>
        </div>
        <div class="form-group">
            <label for="">Booking Fee:</label>
            <input class="form-control" type="number" step="0.25" name="editBookingFee" value="{{$terminal->booking_fee}}" required>
        </div>
    </div>

@endsection
@section('form-btn')
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#form-modal" data-keyboard="true">Save Changes</a>
@endsection

@section('modal-title','Confirm')
@section('modal-body')
    <p>Are you sure you want to overwrite the changes?</p>
@endsection

@section('modal-btn')
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" style="width:33%;">Submit</button>
@endsection

@section('scripts')
@parent

@endsection

@section('scripts') 
@parent
    <script>
        $(document).keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                $('#form-modal').modal('toggle');
                event.preventDefault();
            }
        });   
    </script>

@endsection
