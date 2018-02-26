@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">

<div class="container">
 
<h1>Add Announcement</h1>
<form method="post" action="/home/announcements/{{ $announcement->announcement_id }}">
{{ csrf_field() }}
{{ method_field('PATCH')}}

<div class="form-group">
    <label>Viewer: {{ $announcement->announcement_id}}</label> 
    <select name="viewer">
        <option value="Public"{{ $announcement->viewer == 'Public' ? 'selected="selected"' : '' }}>Public</option>
        <option value="Driver Only"{{ $announcement->viewer == 'Driver Only' ? 'selected="selected"' : '' }}>Driver Only</option>
        <option value="Customer Only"{{ $announcement->viewer == 'Customer Only' ? 'selected="selected"' : '' }}>Customer Only</option>
        <option value="Only Me"{{ $announcement->viewer == 'Only Me' ? 'selected="selected"' : '' }}>Only Me</option>

    </select>
<textarea class="form-control" rows="5" name="announce">{{ $announcement->description }}</textarea>
</div>

<button type="submit" class="btn btn-outline-primary">Submit</button>
<a href="/home/announcements/" class="btn btn-md btn-outline-primary btn-create">Back</a>
</form>
</div>
@endsection