@extends('vans.master')

@section('content')
    @include('message.error')
    <form method="POST" action="/home/settings/fees/{{$fee->fad_id}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="Description">Description</label>
            <input type="text" class="form-control" id="Description" aria-describedby="Description" placeholder="Description" name="description" value="{{$fee->description}}">
        </div>

        <div class="form-group">
            <label for="Amount">Amount</label>
            <input type="text" class="form-control" id="PlateNumber" aria-describedby="Plate Number" placeholder="Plate Number" name="amount" value="{{$fee->amount}}">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection