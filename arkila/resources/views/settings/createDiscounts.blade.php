@extends('vans.master')

@section('content')

@include('message.error')

    <form method="POST" action="/home/settings/discounts">
        {{csrf_field()}}
        <div class="form-group">
            <label for="Description">Description</label>
            <input value = "{{old('description')}}" type="text" class="form-control" id="Description" aria-describedby="Description" placeholder="Description" name="description">
        </div>

            <div class="form-group">
                <label for="Amount">Amount</label>
                <input value = "{{old('amount')}}" type="text" class="form-control" id="Amount" aria-describedby="Amount" placeholder="Amount" name="amount">
            </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection