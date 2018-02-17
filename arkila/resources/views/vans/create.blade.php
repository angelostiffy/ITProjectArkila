@extends('vans.master')

@section('content')
@include('message.error)
    <form method="POST" action="/home/vans">
        {{csrf_field()}}
        <div class="form-group">
            <label for="PlateNumber">Plate Number</label>
            <input type="text" class="form-control" id="PlateNumber" aria-describedby="Plate Number" placeholder="Plate Number" name="plateNumber">
        </div>

        <div class="form-group">
            <label for="Driver">Driver</label>
            <select id="Driver" name="driver">
                @foreach($drivers as $driver)
                    <option value="{{$driver->driver_id}}">{{$driver->full_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Operator">Operator</label>
            <select id="Operator" name="operator">
                @foreach($operators as $operator)
                    <option value="{{$operator->operator_id}}">{{$operator->full_name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Model">Model</label>
            <input type="text" class="form-control" id="Model" aria-describedby="Model" placeholder="Model" name="model">
        </div>

        <div class="form-group">
            <label for="SeatingCapacity">Seating Capacity</label>
            <input type="number" class="form-control" id="SeatingCapacity" aria-describedby="SeatingCapacity" placeholder="SeatingCapacity" name="seatingCapacity">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection