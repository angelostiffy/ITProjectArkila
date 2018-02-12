@extends('layouts.app')

@section('content')
<h1>Edit </h1><hr>
<form method="post" action="{{ route('drivers.update', [$driver->driver_id]) }}">
{{ csrf_field() }}

    @if (isset($driver))
        {{ method_field('PUT')}}
    @endif
    <label>Member ID</label>
    <input type="name" class="form-control" name="member" placeholder="Enter Driver's Member ID" value="{{ isset($driver) ? $driver->member_id : '' }}">

    <label>First Name</label>
    <input type="name" class="form-control" name="first" placeholder="Enter Driver's First Name" value="{{ isset($driver) ? $driver->first_name : '' }}">

    <label>Last Name</label>
    <input type="name" class="form-control" name="last" placeholder="Enter Driver's Last Name" value="{{ isset($driver) ? $driver->last_name : '' }}">

    <label>Middle Name</label>
    <input type="name" class="form-control" name="middle" placeholder="Enter Driver's Middle Name" value="{{ isset($driver) ? $driver->middle_name : '' }}">

    <label>Operator</label>
    <select name="operator">
    <option value="0">Select Category</option>    
    @foreach($operator as $operators)
    <option value="{{ $operators->operator_id }}"{{ $operators->operator_id == $driver->operator->operator_id ? 'selected="selected"' : '' }}>{{ $operators->first_name . " " . $operators->last_name }}</option>
    @endforeach

    </select>
    <br>

 
    <label>Address</label>
    <input type="text" class="form-control" name="address" placeholder="Enter Driver's Address" value="{{ isset($driver) ? $driver->address : '' }}">

    <label>Contact Number</label>
    <input type="number" class="form-control" name="contactn" placeholder="Enter Driver's Contact Number" value="{{ isset($driver) ? $driver->contact_number : '' }}">

    <label>Provincial Address</label>
    <input type="text" class="form-control" name="paddress" placeholder="Enter Driver's Provincial Address" value="{{ isset($driver) ? $driver->provincial_address : '' }}">

    <label>Age</label>
    <input type="number" class="form-control" name="age" placeholder="Enter Driver's Age" value="{{ isset($driver) ? $driver->age : '' }}">

    <label>Birth Date</label>
    <input type="date" class="form-control" name="birthdate" placeholder="Enter Driver's Birth Date" value="{{ isset($driver) ? $driver->birth_date : '' }}">

    <label>Birth Place</label>
    <input type="text" class="form-control" name="bplace" placeholder="Enter Driver's Birth Place" value="{{ isset($driver) ? $driver->birth_place : '' }}">

    <label>Gender</label><br>
    <input type="radio" name="gender" value="Male" {{ $driver->gender == 'Male' ? 'checked' : '' }}>Male<br>
    <input type="radio" name="gender" value="Female" {{ $driver->gender == 'Female' ? 'checked' : '' }}>Female<br>

    <label>Citizenship</label>
    <input type="text" class="form-control" name="citizenship" placeholder="Enter Driver's Citizenship"value="{{ isset($driver) ? $driver->citizenship : '' }}">

    <label>Civil Status</label><br>
    <input type="radio" name="cstatus" value="Single" {{ $driver->civil_status == 'Single' ? 'checked' : '' }}>Single<br>
    <input type="radio" name="cstatus" value="Married" {{ $driver->civil_status == 'Married' ? 'checked' : '' }}>Married<br>
    <input type="radio" name="cstatus" value="Divorced" {{ $driver->civil_status == 'Divorced' ? 'checked' : '' }}>Divorced<br>

    <label>Number Of Children</label>
    <input type="number" class="form-control" name="nochild" placeholder="Enter Driver's Number of Children"value="{{ isset($driver) ? $driver->number_of_children : '' }}">

    <label>Spouse</label>
    <input type="name" class="form-control" name="spouse" placeholder="Enter Driver's Spouse Name"value="{{ isset($driver) ? $driver->spouse : '' }}">

    <label>Spouse Birth Date</label>
    <input type="date" class="form-control" name="spousebday"value="{{ isset($driver) ? $driver->spouse_birthdate : '' }}">

    <label>Father's Name</label>
    <input type="name" class="form-control" name="father" placeholder="Enter Driver's Father Name"value="{{ isset($driver) ? $driver->father_name : '' }}">

    <label>Father's Occupation</label>
    <input type="text" class="form-control" name="fatheroccup" placeholder="Enter Driver's Father Occupation"value="{{ isset($driver) ? $driver->father_occupation : '' }}">

    <label>Mother's Name</label>
    <input type="name" class="form-control" name="mother" placeholder="Enter Driver's Mother Name"value="{{ isset($driver) ? $driver->mother_name : '' }}">

    <label>Mother's Occupation</label>
    <input type="text" class="form-control" name="motheroccup" placeholder="Enter Driver's Mother Occupation"value="{{ isset($driver) ? $driver->mother_occupation : '' }}">

    <label>Person in Case of Emergency</label>
    <input type="name" class="form-control" name="personemergency" placeholder="Enter Driver's Contact in Case of Emergency"value="{{ isset($driver) ? $driver->person_in_case_of_emergency : '' }}">

    <label>Address</label>
    <input type="text" class="form-control" name="peAddress" placeholder="Enter Driver's Contact in Case of Emergency Address"value="{{ isset($driver) ? $driver->emergency_address : '' }}">

    <label>Contact Number</label>
    <input type="number" class="form-control" name="peContactnum" placeholder="Enter Driver's Contact in Case of Emergency Contact Number"value="{{ isset($driver) ? $driver->emergency_contactno : '' }}">

    <label>SSS #</label>
    <input type="text" class="form-control" name="sss" placeholder="Enter Driver's SSS Number"value="{{ isset($driver) ? $driver->SSS : '' }}">

    <label>License Number</label>
    <input type="text" class="form-control" name="licenseNum" placeholder="Enter Driver's License Number"value="{{ isset($driver) ? $driver->license_number : '' }}">

    <label>Expiry Date</label>
    <input type="date" class="form-control" name="exp"value="{{ isset($driver) ? $driver->expiry_date : '' }}">



  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/home/drivers">View All Drivers</a>


@endsection