@extends('layouts.form')
@section('title', 'Edit Ticket')
@section('back-link', URL::previous())
@section('form-action', route('tickets.update', [$ticket->ticket_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'Edit Ticket')
@section('form-body')
	@include('message.error')

	 <div>
	 	<label for="description">Description:</label>
         <input value='{{old('description') ?? $ticket->ticket_number }}' name="description" type="text" class="form-control" maxlength="5" required>
	 </div>

    <div class="form-group">
        <label>Terminal:</label>

        <select class="form-control" name="terminal">
            @foreach($terminals as $terminal)
                <option @if(old('terminal') == $terminal->terminal_id || $ticket->terminal->terminal_id == $terminal->terminal_id) {{'selected'}}@endif value="{{$terminal->terminal_id}}">{{$terminal->description}}</option>
            @endforeach
        </select>

    </div>


@endsection
@section('form-btn')
    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-modal" data-keyboard="true">Save Changes</a>
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