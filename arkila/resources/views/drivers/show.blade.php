@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-6">
<div class="panel panel-primary">
    <div class="panel-heading">My Drivers</div>
    <div class="panel-body">
       
    <ul class="list-group">
        <li class="list-group-item">Last Name: {{ $driver->last_name }}</li>
        <li class="list-group-item">First Name: {{ $driver->first_name }}</li>
        <li class="list-group-item">Middle Name: {{ $driver->middle_name }}</li>
        <li class="list-group-item">Status: {{ $driver->status }}</li>
        <li class="list-group-item">Age: {{ $driver->age }}</li>
        <li class="list-group-item">Gender: {{ $driver->gender }}</li>
        <li class="list-group-item">Birth Date: {{ $driver->birth_date }}</li>
        <li class="list-group-item">Citizenship: {{ $driver->citizenship }}</li>
        <li class="list-group-item">Civil Status: {{ $driver->civil_status }}</li>
        <li class="list-group-item">Number Of Children: {{ $driver->number_of_children }}</li>
        <li class="list-group-item">License Number: {{ $driver->license_number }}</li>
        <li class="list-group-item">Expiry Date: {{ $driver->expiry_date }}</li>

    </ul>
    </div>
    </div>
</div>
<a href="/home/drivers">View All Drivers</a>

@endsection