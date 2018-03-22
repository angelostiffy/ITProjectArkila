@extends('layouts.error') 
@section('title', 'Error 404') 
@section('content') 

<div class="error-page">

    <div class="section text-center" style="margin-top:14%">       
        <h1 class="text-yellow" style="font-size:200pt"> 408</h1>       
        <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
        <p>
            We could not find the page you were looking for.
        </p>

    </div>
    <!-- /.error-content -->
</div>

@endsection