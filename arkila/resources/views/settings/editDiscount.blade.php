@extends('layouts.form')
@section('title', 'Edit Discount')
@section('back-link', URL::previous())
@section('form-action', route('discounts.update', [$discount->fad_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'Edit Discount')
@section('form-body')
	
	<div>
	 	<label for="description">Description:</label>
	 	<p>{{$discount->description}}</p>
	 </div>

    <div class="form-group">
        <label>Amount:</label>
        <input type="number" class="form-control" name="editDiscountAmount" step = "0.25" min="1"  max="5000" value="{{$discount->amount}}" required>
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