@extends('layouts.app')

@section('content')

<div class="container">
<h1> Announcement <span class="pull-right"><a href="/home/announcements/create" class="btn btn-sm btn-outline-primary btn-create">Create New</a></span></h1>

@foreach ($announcements->sortByDesc('created_at') as $announcement)
    <div class="form-group"> 
        <label for=" Email1msg">Announcement {{ $announcement->announcement_id }}: {{ $announcement->viewer }}</label>
        
        <textarea class="form-control" rows="5" disabled>{{ $announcement->description }}</textarea>
        <form method="POST" action="/home/announcements/{{$announcement->announcement_id}}">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <a href="/home/announcements/{{ $announcement->announcement_id }}/edit/" class="btn btn-sm btn-primary btn-outline-create">Edit</a>
            <button class="btn btn-sm btn-outline-danger">Delete</button>
        </form> 
    </div>
@endforeach

</div>
@endsection