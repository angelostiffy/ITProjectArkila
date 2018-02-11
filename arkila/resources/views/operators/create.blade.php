@extends('layouts.app')

@section('content')
<h1>Add New Driver </h1><hr>
<form method="post" action="{{ route('operators.index')}}">
{{ csrf_field() }}

    <div class="form-group">
        <label >First Name</label>
        <input type="text" class="form-control" name="firstName" placeholder="First Name">
    </div>
    <div class="form-group">
        <label>Middle Name</label>
        <input type="text" class="form-control" name="middleName" placeholder="Middle Name">
    </div>
    <div class="form-group">
        <label >Last Name</label>
        <input type="text" class="form-control" name="lastName" placeholder="Last Name">
    </div>
    <div class="form-group">
        <label>Contact Number</label>
        <input type="text" class="form-control" name="contactNumber" placeholder="Contact Number">
    </div>
    <div class="form-group">
        <label >Address</label>
        <input type="text" class="form-control" name="address" placeholder="Address">
    </div>
    <div class="form-group">
        <label >Provincial Address</label>
        <input type="text" class="form-control" name="provincialAddress" placeholder="Provincial Address">
    </div>
    <div class="form-group">
        <label >Age</label>
        <input type="number" class="form-control" name="age" placeholder="Age">
    </div>
    <div class="form-group">
        <label >Birth Date</label>
        <input type="date" class="form-control" name="birthDate" placeholder="Birth Date">
    </div>
    <div class="form-group">
        <label >Birth Place</label>
        <input type="text" class="form-control" name="birthPlace" placeholder="Birth Place">
    </div>
    <div class="form-group">
        <label >Gender</label><br>
        <input type="radio" name="gender" value="Male">Male<br>
        <input type="radio" name="gender" value="Female">Female
    </div>
    <div class="form-group">
        <label >Citizenship</label>
        <input type="text" class="form-control" name="citizenship" placeholder="Birth Place">
    </div>
    <div class="form-group">
        <label >Civil Status</label><br>
        <input type="radio" name="cStatus" value="Single">Single<br>
        <input type="radio" name="cStatus" value="Married">Married<br>
        <input type="radio" name="cStatus" value="Divorced">Divorced
    </div>
    <div class="form-group">
        <label >Number of Childer</label>
        <input type="text" class="form-control" name="noChild" placeholder="Number of Children">
    </div>
    <div class="form-group">
        <label >Spouse</label>
        <input type="text" class="form-control" name="spouse" placeholder="Name of Spouse">
    </div>
    <div class="form-group">
        <label >Spouse Birth Date</label>
        <input type="date" class="form-control" name="spouseBirthDate" placeholder="Spouse Birth Date">
    </div>
    <div class="form-group">
        <label >Father's Name</label>
        <input type="text" class="form-control" name="father" placeholder="Father's Name">
    </div>
    <div class="form-group">
        <label >Father's Occupation</label>
        <input type="text" class="form-control" name="fatherOccupation" placeholder="Father's Occupation">
    </div>
    <div class="form-group">
        <label >Mother's Name</label>
        <input type="text" class="form-control" name="mother" placeholder="Mother's Name">
    </div>
    <div class="form-group">
        <label >Mother's Occupation</label>
        <input type="text" class="form-control" name="motherOccupation" placeholder="Mother's Name">
    </div>
    <div class="form-group">
        <label >Person in Case of Emergency</label>
        <input type="text" class="form-control" name="pCaseofEmergency" placeholder="Person in Case of Emergency">
    </div>
    <div class="form-group">
        <label>Emergency Address</label>
        <input type="text" class="form-control" name="emergencyAddress" placeholder="Emergency Address">
    </div>
    <div class="form-group">
        <label>Emergency Contact Number</label>
        <input type="text" class="form-control" name="emergencyContactNo" placeholder="Emergency Contact Number">
    </div>
    <div class="form-group">
        <label>SSS ID</label>
        <input type="tel" class="form-control" name="sssId" placeholder="SSS ID">
    </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/home/drivers">View All Operators</a>


@endsection