@extends('layouts.error') 
@section('title', 'Error 505') 
@section('content') 

<div class="error-page">

    <div class="section text-center" style="margin-top:14%">       
        <h1 class="text-red" style="font-size:200pt"> 504</h1>       
        <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong Gateway Timeout.</h3>
        <p>
            We will work on fixing that right away.
        </p>

    </div>
    
</div>
<!-- /.error-page -->

@endsection