
@extends('layouts.form') 
@section('title', 'Add Van')
@section('back-link','facebook.com')
@section('form-title', 'Add Van') 
@section('form-body')
	<div class="form-group">
	<label for="">Operator:</label> <span>Operator Name</span>
    </select>
    </div>
	<div class="form-group">
	<label for="">Plate Number:</label>
    <input type="text" class="form-control" placeholder="Plate Number"> 
    </div>
    <div class="form-group">
	<label for="">Van Model</label>
    <input type="text" class="form-control" placeholder="Van Model"> 
    </div>

    <div class="form-group">
	<label for="">Seating Capacity</label>
    <input type="number" class="form-control" placeholder="Seating Capacity" max="16" min="1">
    </div>
    
    <div class="form-group">
    <label for="">Driver</label>
    <select name="" id="" class="form-control select2">
        <option value=""></option>
        <option value="">d1</option>
        <option value="">d2</option>
        <option value="">d3</option>
        <option value="">d4</option>
    </select>
    </div>
@endsection 

@section('others')
<div class="form-group">
<input type="checkbox" class="minimal"> <span>Add new driver to this van unit</span>
@endsection

@section('form-btn')
<a href="changeDriver.html" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Add unit</a> 
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
    })
	</script>
@endsection
