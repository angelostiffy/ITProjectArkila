@extends('layouts.app')

@section('content')

<div class="container">
<h1> Announcement <span class="pull-right"><a href="/home/announcements/create" class="btn btn-sm btn-primary btn-create">Create New</a></span></h1>

@foreach ($announce->sortByDesc('created_at') as $announces)
    <div class="form-group"> 
        <label for=" Email1msg">Announcement {{ $announces->announcement_id }}: {{ $announces->viewer }}</label>
        
        <textarea class="form-control" rows="5" disabled>{{ $announces->description }}</textarea>
        <form method="POST" action="/home/announcements/{{$announces->announcement_id}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <a href="/home/announcements/{{ $announces->announcement_id }}/edit/" class="btn btn-sm btn-primary btn-create">Edit</a>
            <button class="btn btn-sm btn-danger btn-create">Delete</button>
        </form> 
    </div>
@endforeach

</div>
@endsection