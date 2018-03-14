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
        
        <label>Terminal Name:</label>
        <input type="text" class="form-control" name="editTerminalName" value="{{$terminal->description}}" maxlength="30" required>
    </div>

@endsection
@section('form-btn')
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Save Changes</a>
@endsection

@section('modal-title','Confirm')
@section('modal-body')
    <p>Are you sure you want to edit this terminal?</p>
@endsection

@section('modal-btn')
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" style="width:33%;">Submit</button>
@endsection

@section('scripts')
@parent

@endsection
