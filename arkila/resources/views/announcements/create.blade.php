@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">

<div class="container">
 
<h1>Add Announcement</h1>
<form method="post" action="{{ route('announcements.index') }}">
{{ csrf_field() }}

<div class="form-group">
    <label>Viewer:</label> 
        <select name="viewer">
            <option value="Public">Public</option>
            <option value="Driver Only">Driver Only</option>
            <option value="Customer Only">Customer Only</option>
            <option value="Only Me">Only Me</option>
        </select>
    <textarea class="form-control" rows="5" name="announce"></textarea>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<a href="/home/announcements/" class="btn btn-md btn-primary btn-create">Back</a>
</form>
</div>
@endsection