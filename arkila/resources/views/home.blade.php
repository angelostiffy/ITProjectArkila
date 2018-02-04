@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!

                    <?php
                    use App\Van;
                    $vans = Van::all();
                    ?>

                    @foreach ($vans as $van)
                        <h1> {{ $van->plate_number }} {{ $van->model }} is driven by {{ $van->driver->last_name }} </h1>
                        @endforeach

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
