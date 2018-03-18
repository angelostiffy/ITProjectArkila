@extends('layouts.form')
@section('title', 'Create New Discount')
@section('back-link', URL::previous())
@section('form-action', route('discounts.store'))
@section('form-title', 'Create Discount')
@section('form-body')
				  
<div class="form-group">
    <div style="margin-top:18%">
        @include('message.error')
    </div>

    <label>Description:</label>
    <input type="text" class="form-control" name="addDiscountDesc" required>
</div>
<div class="form-group">
    <label>Amount:</label>
    <input type="number" class="form-control" name="addDiscountAmount" step="0.25" min="1" max="5000" placeholder="Php 0.00" required>
</div>

@endsection
@section('form-btn')
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#form-modal" data-keyboard="true">Create</a>
@endsection

@section('modal-title','Confirm')
@section('modal-body')
    <p>Are you sure you want to this discount?</p>
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
