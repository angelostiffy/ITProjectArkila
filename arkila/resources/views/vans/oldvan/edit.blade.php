@extends('vans.oldvan.master')

@section('content')
    @include('message.error')
    <form method="POST" action="/home/vans/{{$van->plate_number}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="PlateNumber">Plate Number</label>
            <input type="text" class="form-control" id="PlateNumber" aria-describedby="Plate Number" placeholder="Plate Number" name="plateNumber" value="{{$van->plate_number}}">
        </div>

        <div class="form-group">
            <label for="Driver">Driver</label>
            <select id="Driver" name="driver">
                @foreach($drivers as $driver)
                    <option value="{{$driver->driver_id}}" @if ($driver->driver_id === $van->driver_id) {{'selected'}} @endif>{{$driver->full_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Operator">Operator</label>
            <select id="Operator" name="operator" value="{{$van->operator_id}}">
                @foreach($operators as $operator)
                    <option value="{{$operator->operator_id}}" @if ($operator->operator_id === $van->operator_id) {{'selected'}} @endif>{{$operator->full_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Model">Model</label>
            <input type="text" class="form-control" id="Model" aria-describedby="Model" placeholder="Model" name="model" value="{{$van->model}}">
        </div>

        <div class="form-group">
            <label for="SeatingCapacity">Seating Capacity</label>
            <input type="number" class="form-control" id="SeatingCapacity" aria-describedby="SeatingCapacity" placeholder="SeatingCapacity" name="seatingCapacity" value="{{$van->seating_capacity}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection