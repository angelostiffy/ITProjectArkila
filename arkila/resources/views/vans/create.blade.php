
@extends('layouts.form') 
@section('title', 'Add Van')
@section('back-link',URL::previous())
@section('form-action',route('vans.store'))
@section('form-title', 'Add Van') 
@section('form-body')
@include('message.error')
    <div class="form-group">
	<label for="">Operator:</label>
    <select name="operator" id="" class="form-control select2">
    	@foreach($operators as $operator)
        <option value="{{$operator->member_id}}">{{$operator->full_name}}</option>
        @endforeach
    </select>
    </div>

	<div class="form-group">
	<label for="">Plate Number:</label>
    <input name="plateNumber" type="text" class="form-control" placeholder="Plate Number">
    </div>

    <div class="form-group">
	<label for="">Van Model</label>
    <input name="vanModel" type="text" class="form-control" placeholder=" Van Model">
    </div>

    <div class="form-group">
	<label for="">Seating Capacity</label>
    <input name="seatingCapacity" type="number" class="form-control" placeholder="Seating Capacity" max="15" min="1">
    </div>
@endsection 
@section('others')
<input name="addDriver" type="checkbox" class="minimal"> <span>Add new driver to this van unit</span>
@endsection


@section('form-btn')
<button class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Add unit</button>
@endsection 
@section('modal-title', 'Alert') 
@section('modal-body')
<h4>Are you sure you want to add?</h4>
@endsection 
@section('modal-btn')
<button type="submit" class="btn btn-primary"> Yes</button>
<button type="submit" class="btn btn-default"> No</button>
@endsection
@section('scripts')
	@parent
	<script>
    $(function () {
        $('.select2').select2()

        $('input[type="checkbox"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
        })
    });
	</script>
@endsection
