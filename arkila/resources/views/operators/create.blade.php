@extends('layouts.app')

@section('content')
<h1>Add New Driver </h1><hr>
<form method="post" action="{{ route('drivers.index')}}">
{{ csrf_field() }}

    <div class="form-group">
        <label >Last Name</label>
        <input type="text" class="form-control" id="lastName" placeholder="Last Name">
    </div>
    <div class="form-group">
        <label >First Name</label>
        <input type="text" class="form-control" id="firstName" placeholder="First Name">
    </div>
    <div class="form-group">
        <label>Middle Name</label>
        <input type="text" class="form-control" id="middleName" placeholder="Middle Name">
    </div>
    <div class="form-group">
        <label>Contact Number</label>
        <input type="text" class="form-control" id="contactNumber" placeholder="Contact Number">
    </div>
    <div class="form-group">
        <label >Address</label>
        <input type="text" class="form-control" id="address" placeholder="Address">
    </div>
    <div class="form-group">
        <label >Provincial Address</label>
        <input type="text" class="form-control" id="provincialAddress" placeholder="Provincial Address">
    </div>
    <div class="form-group">
        <label >Age</label>
        <input type="number" class="form-control" id="age" placeholder="Age">
    </div>
    <div class="form-group">
        <label >Birth Date</label>
        <input type="date" class="form-control" id="birthDate" placeholder="Birth Date">
    </div>
    <div class="form-group">
        <label >Birth Place</label>
        <input type="text" class="form-control" id="birthPlace" placeholder="Birth Place">
    </div>
    <div class="form-group">
        <label >Gender</label><br>
        <input type="radio" name="gender" value="Male">Male<br>
        <input type="radio" name="gender" value="Female">Female
    </div>
    <div class="form-group">
        <label >Citizenship</label>
        <input type="text" class="form-control" id="birthPlace" placeholder="Birth Place">
    </div>
    <div class="form-group">
        <label >Gender</label><br>
        <input type="radio" name="cstatus" value="Single">Single<br>
        <input type="radio" name="cstatus" value="Married">Married<br>
        <input type="radio" name="cstatus" value="Divorced">Divorced
    </div>
    <div class="form-group">
        <label >Spouse</label>
        <input type="text" class="form-control" id="spouse" placeholder="Name of Spouse">
    </div>
    <div class="form-group">
        <label >Spouse Birth Date</label>
        <input type="date" class="form-control" id="spouseBirthDate" placeholder="Spouse Birth Date">
    </div>
    <div class="form-group">
        <label >Father's Name</label>
        <input type="text" class="form-control" id="fatherName" placeholder="Father's Name">
    </div>
    <div class="form-group">
        <label >Father's Occupation</label>
        <input type="text" class="form-control" id="fatherOccupation" placeholder="Father's Occupation">
    </div>
    <div class="form-group">
        <label >Mother's Name</label>
        <input type="text" class="form-control" id="motherName" placeholder="Mother's Name">
    </div>
    <div class="form-group">
        <label >Mother's Occupation</label>
        <input type="text" class="form-control" id="motherOccupation" placeholder="Mother's Name">
    </div>
    <div class="form-group">
        <label >Person in Case of Emergency</label>
        <input type="text" class="form-control" id="pCaseofEmergency" placeholder="Person in Case of Emergency">
    </div>
    <div class="form-group">
        <label>Emergency Address</label>
        <input type="text" class="form-control" id="emergencyAddress" placeholder="Emergency Address">
    </div>
    <div class="form-group">
        <label>Emergency Contact Number</label>
        <input type="text" class="form-control" id="emergencyContactNo" placeholder="Emergency Contact Number">
    </div>
    <div class="form-group">
        <label>SSS ID</label>
        <input type="tel" pattern="\d*" class="form-control" id="sssId" placeholder="SSS ID">
    </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/home/drivers">View All Operators</a>


@endsection