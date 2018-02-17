@extends('layouts.app')

@section('content')
<h1>Add New Driver </h1><hr>
<form method="post" action="{{ route('drivers.index')}}">
{{ csrf_field() }}

    <label>Member ID</label>
    <input type="name" class="form-control" name="member" placeholder="Enter Driver's Member ID" value="{{ old('member') }}">

    <label>First Name</label>
    <input type="name" class="form-control" name="first" placeholder="Enter Driver's First Name" value="{{ old('first') }}">
    
    <label>Last Name</label>
    <input type="name" class="form-control" name="last" placeholder="Enter Driver's Last Name" value="{{ old('last') }}">

    <label>Middle Name</label>
    <input type="name" class="form-control" name="middle" placeholder="Enter Driver's Middle Name" value="{{ old('middle') }}">

    <label>Operator</label>
    <select name="operator">
    <option>Select Category</option>
    @foreach($operators as $operator)
    <option value="{{ $operator->operator_id }}">{{ $operator->first_name . " " . $operator->last_name }}</option>
    @endforeach
    </select>
    <br>

    <label>Address</label>
    <input type="text" class="form-control" name="address" placeholder="Enter Driver's Address" value="{{ old('address') }}">

    <label>Contact Number</label>
    <input type="number" class="form-control" name="contactn" placeholder="Enter Driver's Contact Number" value="{{ old('contactn') }}">

    <label>Provincial Address</label>
    <input type="text" class="form-control" name="paddress" placeholder="Enter Driver's Provincial Address" value="{{ old('paddress') }}">

    <label>Age</label>
    <input type="number" class="form-control" name="age" placeholder="Enter Driver's Age" value="{{ old('age') }}">

    <label>Birth Date</label>
    <input type="date" class="form-control" name="birthdate" placeholder="Enter Driver's Birth Date" value="{{ old('birthdate') }}">

    <label>Birth Place</label>
    <input type="text" class="form-control" name="bplace" placeholder="Enter Driver's Birth Place" value="{{ old('bplace') }}">

    <label>Gender</label><br>
    <input type="radio" name="gender" value="Male">Male<br>
    <input type="radio" name="gender" value="Female">Female

    <label>Citizenship</label>
    <input type="text" class="form-control" name="citizenship" placeholder="Enter Driver's Citizenship" value="{{ old('citizenship') }}">

    <label>Civil Status</label><br>
    <input type="radio" name="cstatus" value="Single">Single<br>
    <input type="radio" name="cstatus" value="Married">Married<br>
    <input type="radio" name="cstatus" value="Divorced">Divorced

    <label>Number Of Children</label>
    <input type="number" class="form-control" name="nochild" placeholder="Enter Driver's Number of Children" value="{{ old('nochild') }}">

    <label>Spouse</label>
    <input type="name" class="form-control" name="spouse" placeholder="Enter Driver's Spouse Name" value="{{ old('spouse') }}">

    <label>Spouse Birth Date</label>
    <input type="date" class="form-control" name="spousebday" value="{{ old('spousebday') }}">

    <label>Father's Name</label>
    <input type="name" class="form-control" name="father" placeholder="Enter Driver's Father Name" value="{{ old('father') }}">

    <label>Father's Occupation</label>
    <input type="text" class="form-control" name="fatheroccup" placeholder="Enter Driver's Father Occupation" value="{{ old('fatheroccup') }}">

    <label>Mother's Name</label>
    <input type="name" class="form-control" name="mother" placeholder="Enter Driver's Mother Name" value="{{ old('mother') }}">

    <label>Mother's Occupation</label>
    <input type="text" class="form-control" name="motheroccup" placeholder="Enter Driver's Mother Occupation" value="{{ old('motheroccup') }}">

    <label>Person in Case of Emergency</label>
    <input type="name" class="form-control" name="personemergency" placeholder="Enter Driver's Contact in Case of Emergency" value="{{ old('personemergency') }}">

    <label>Address</label>
    <input type="text" class="form-control" name="peAddress" placeholder="Enter Driver's Contact in Case of Emergency Address" value="{{ old('peAddress') }}">

    <label>Contact Number</label>
    <input type="number" class="form-control" name="peContactnum" placeholder="Enter Driver's Contact in Case of Emergency Contact Number" value="{{ old('peContactnum') }}">

    <label>SSS #</label>
    <input type="text" class="form-control" name="sss" placeholder="Enter Driver's SSS Number" value="{{ old('sss') }}">

    <label>License Number</label>
    <input type="text" class="form-control" name="licenseNum" placeholder="Enter Driver's License Number" value="{{ old('licenseNum') }}">

    <label>Expiry Date</label>
    <input type="date" class="form-control" name="exp" value="{{ old('exp') }}">



  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/home/drivers">View All Drivers</a>


@endsection