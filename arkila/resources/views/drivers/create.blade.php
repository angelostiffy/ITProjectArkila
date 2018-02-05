@extends('layouts.app')

@section('content')
<h1>Add New Driver </h1><hr>
<form method="post" action="{{ route('drivers.index')}}">
{{ csrf_field() }}

    <label>First Name</label>
    <input type="name" class="form-control" name="first" placeholder="Enter Driver's First Name">

    <label>Last Name</label>
    <input type="name" class="form-control" name="last" placeholder="Enter Driver's Last Name">

    <label>Middle Name</label>
    <input type="name" class="form-control" name="middle" placeholder="Enter Driver's Middle Name">

    <label>Address</label>
    <input type="text" class="form-control" name="address" placeholder="Enter Driver's Address">

    <label>Contact Number</label>
    <input type="number" class="form-control" name="contactn" placeholder="Enter Driver's Contact Number">

    <label>Provincial Address</label>
    <input type="text" class="form-control" name="paddress" placeholder="Enter Driver's Provincial Address">

    <label>Age</label>
    <input type="number" class="form-control" name="age" placeholder="Enter Driver's Age">

    <label>Birth Date</label>
    <input type="date" class="form-control" name="birthdate" placeholder="Enter Driver's Birth Date">

    <label>Birth Place</label>
    <input type="text" class="form-control" name="bplace" placeholder="Enter Driver's Birth Place">

    <label>Gender</label><br>
    <input type="radio" name="gender" value="Male">Male<br>
    <input type="radio" name="gender" value="Female">Female

    <label>Citizenship</label>
    <input type="text" class="form-control" name="citizenship" placeholder="Enter Driver's Citizenship">

    <label>Civil Status</label><br>
    <input type="radio" name="cstatus" value="Single">Single<br>
    <input type="radio" name="cstatus" value="Married">Married<br>
    <input type="radio" name="cstatus" value="Divorced">Divorced

    <label>Number Of Children</label>
    <input type="number" class="form-control" name="nochild" placeholder="Enter Driver's Number of Children">

    <label>Spouse</label>
    <input type="name" class="form-control" name="spouse" placeholder="Enter Driver's Spouse Name">

    <label>Spouse Birth Date</label>
    <input type="date" class="form-control" name="spousebday">

    <label>Father's Name</label>
    <input type="name" class="form-control" name="father" placeholder="Enter Driver's Father Name">

    <label>Father's Occupation</label>
    <input type="text" class="form-control" name="fatheroccup" placeholder="Enter Driver's Father Occupation">

    <label>Mother's Name</label>
    <input type="name" class="form-control" name="mother" placeholder="Enter Driver's Mother Name">

    <label>Mother's Occupation</label>
    <input type="text" class="form-control" name="motheroccup" placeholder="Enter Driver's Mother Occupation">

    <label>Person in Case of Emergency</label>
    <input type="name" class="form-control" name="personemergency" placeholder="Enter Driver's Contact in Case of Emergency">

    <label>Address</label>
    <input type="text" class="form-control" name="peAddress" placeholder="Enter Driver's Contact in Case of Emergency Address">

    <label>Contact Number</label>
    <input type="number" class="form-control" name="peContactnum" placeholder="Enter Driver's Contact in Case of Emergency Contact Number">

    <label>SSS #</label>
    <input type="text" class="form-control" name="sss" placeholder="Enter Driver's SSS Number">

    <label>License Number</label>
    <input type="text" class="form-control" name="licenseNum" placeholder="Enter Driver's License Number">

    <label>Expiry Date</label>
    <input type="date" class="form-control" name="exp">



  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/home/drivers">View All Drivers</a>


@endsection