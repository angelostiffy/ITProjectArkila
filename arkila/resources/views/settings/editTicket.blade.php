@extends('layouts.form')
@section('title', 'Edit Ticket')
@section('back-link', URL::previous())
@section('form-action', route('tickets.update', [$ticket->ticket_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'Edit Ticket')
@section('form-body')

	 <div>
	 	<label for="description">Description:<span class="text-red">*</span></label>
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
    <button type="submit" class="btn btn-primary" >Save Changes</button>
@endsection
