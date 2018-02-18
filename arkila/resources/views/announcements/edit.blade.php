@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">

<div class="container">
 
<h1>Add Announcement</h1>
<form method="post" action="/home/announcements/{{ $announce->announcement_id }}">
{{ csrf_field() }}
{{ method_field('PATCH')}}

<div class="form-group">
    <label>Viewer: {{ $announce->announcement_id}}</label> 
    <select name="viewer">
        <option value="Public"{{ $announce->viewer == 'Public' ? 'selected="selected"' : '' }}>Public</option>
        <option value="Driver Only"{{ $announce->viewer == 'Driver Only' ? 'selected="selected"' : '' }}>Driver Only</option>
        <option value="Customer Only"{{ $announce->viewer == 'Customer Only' ? 'selected="selected"' : '' }}>Customer Only</option>
    </select>
<textarea class="form-control" rows="5" name="announce">{{ $announce->description }}</textarea>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<a href="/home/announcements/" class="btn btn-md btn-primary btn-create">Back</a>
</form>
</div>
@endsection