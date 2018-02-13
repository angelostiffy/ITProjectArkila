@extends('layouts.app')
@section('content')
<h1>Add New Driver </h1><hr>
<form method="post" action="{{ route('operators.update', [$operator->operator_id])}}">

{{ csrf_field() }}
{{method_field('PATCH')}}

    <div class="form-group">
	        <label >First Name</label>
	        <input type="text" class="form-control" name="firstName" value="{{ $operator->first_name}}" >
	    </div>
	    <div class="form-group">
	        <label>Middle Name</label>
	        <input type="text" class="form-control" name="middleName" value="{{ $operator->middle_name}}" >
	    </div>
	    <div class="form-group">
	        <label >Last Name</label>
	        <input type="text" class="form-control" name="lastName" value="{{ $operator->last_name}}" >
	    </div>
	    <div class="form-group">
	        <label>Contact Number</label>
	        <input type="text" class="form-control" name="contactNumber" value="{{ $operator->contact_number}}" >
	    </div>
	    <div class="form-group">
	        <label >Address</label>
	        <input type="text" class="form-control" name="address" value="{{ $operator->address}}" >
	    </div>
	    <div class="form-group">
	        <label >Provincial Address</label>
	        <input type="text" class="form-control" name="provincialAddress" value="{{ $operator->provincial_address}}" >
	    </div>
	    <div class="form-group">
	        <label >Age</label>
	        <input type="number" class="form-control" name="age" value="{{ $operator->age}}" >
	    </div>
	    <div class="form-group">
	        <label >Birth Date</label>
	        <input type="date" class="form-control" name="birthDate" value="{{ $operator->birth_date}}" >
	    </div>
	    <div class="form-group">
	        <label >Birth Place</label>
	        <input type="text" class="form-control" name="birthPlace" value="{{ $operator->birth_place}}" >
	    </div>

	    <div class="form-group">
	        <label >Gender</label><br>
	        
	        <input type="radio" name="gender" value="Male"
	        @if($operator->gender == "Male")
	        	{{"checked"}}
	        @endif >Male<br>
	        <input type="radio" name="gender" value="Female"
	        @if($operator->gender == "Female")
	        	{{"checked"}}
	        @endif
	        >
	        Female
	    </div>
	    <div class="form-group">
	        <label >Citizenship</label>
	        <input type="text" class="form-control" name="citizenship" value="{{ $operator->birth_place }}" >
	    </div>
	    <div class="form-group">
	        <label >Civil Status</label><br>
	        <input type="radio" name="cStatus" value="Single"
	        @if($operator->civil_status == "Single")
	        	{{"checked"}}/
	        @endif >Single<br>
	        <input type="radio" name="cStatus" value="Married" @if($operator->civil_status == "Married")
	        	{{"checked"}}
	        @endif >Married<br>
	        <input type="radio" name="cStatus" value="Divorced" @if($operator->civil_status == "Divorced")
	        	{{"checked"}}
	        @endif >Divorced
	    </div>
	    <div class="form-group">
	        <label >Number of Children</label>
	        <input type="text" class="form-control" name="noChild" value="{{ $operator->number_of_children }}" >
	    </div>
	    <div class="form-group">
	        <label >Spouse</label>
	        <input type="text" class="form-control" name="spouse" value="{{ $operator->spouse }}" >
	    </div> 
	    <div class="form-group">
	        <label >Spouse Birth Date</label>
	        <input type="date" class="form-control" name="spouseBirthDate" value="{{ $operator->spouse_birthdate }}" >
	    </div>
	    <div class="form-group">
	        <label >Father's Name</label>
	        <input type="text" class="form-control" name="father" value="{{ $operator->father_name }}" >
	    </div>
	    <div class="form-group">
	        <label >Father's Occupation</label>
	        <input type="text" class="form-control" name="fatherOccupation" value="{{ $operator->father_occupation }}" disbaled>
	    </div>
	    <div class="form-group">
	        <label >Mother's Name</label>
	        <input type="text" class="form-control" name="mother" value="{{ $operator->mother_name }}" disbaled>
	    </div>
	    <div class="form-group">
	        <label >Mother's Occupation</label>
	        <input type="text" class="form-control" name="motherOccupation" value="{{ $operator->mother_occupation }}" disbaled>
	    </div>
	    <div class="form-group">
	        <label >Person in Case of Emergency</label>
	        <input type="text" class="form-control" name="pCaseofEmergency" value="{{ $operator->person_in_case_of_emergency }}" disbaled>
	    </div>
	    <div class="form-group">
	        <label>Emergency Address</label>
	        <input type="text" class="form-control" name="emergencyAddress" value="{{ $operator->emergency_address }}" disbaled>
	    </div>
	    <div class="form-group">
	        <label>Emergency Contact Number</label>
	        <input type="text" class="form-control" name="emergencyContactNo" placeholder="Emergency Contact Number" value="{{ $operator->emergency_contactno }}" disbaled>
	    </div>
	    <div class="form-group">
	        <label>SSS ID</label>
	        <input type="tel" class="form-control" name="sssId" value="{{ $operator->SSS }}" disbaled>
	    </div>	



  <button type="submit" class="btn btn-primary">Submit</button>
</form>	
@endsection