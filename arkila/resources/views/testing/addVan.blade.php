<<<<<<< HEAD
@extends('layouts.form') @section('title', 'Add Van')
@section('back-link','facebook.com')
  @section('form-title', 'Add Van') @section('form-body')
<div class="form-group">
    Plate Number:<input type="text" class="form-control fixVanForm" placeholder="Plate Number"> Van's Model<input type="text" class="form-control" placeholder="First Name"> Seating Capacity<input type="number" class="form-control" placeholder="Address" max="15" min="1">
</div>
@endsection @section('form-btn')
<a href="changeDriver.html" class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Save Changes</a> @endsection @section('modal-title') @section('modal-body')
<h3>Do you want to add a driver to this van?</h3>
@endsection 
@section('modal-btn')
<button type="submit" class="btn btn-primary"> Yes</button>
<button type="submit" class="btn btn-primary"> No</button>
@endsection
=======
@extends('layouts.form') 
@section('title', 'Add Van')
>>>>>>> e659552172b02782c45b98eefbeab76a9e69fab3
