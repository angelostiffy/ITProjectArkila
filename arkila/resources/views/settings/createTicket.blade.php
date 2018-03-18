@extends('layouts.form')
@section('title', 'Create New Ticket')
@section('back-link', URL::previous())
@section('form-action', route('tickets.store'))
@section('form-title', 'Create Ticket')
@section('form-body')
                 
    <div class="form-group">

        <div style="margin-top:18%">
            @include('message.error')
        </div>

        <label>Description:</label>
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
    <a href="" data-toggle="modal" data-target="#form-modal" class="btn btn-primary" data-keyboard="true">Create</a>
@endsection

@section('modal-title','Confirm')
@section('modal-body')
    <p>Are you sure you want to add this Ticket?</p>
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
                event.preventDefault();
            }
        });   
    </script>

@endsection
