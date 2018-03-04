@extends('layouts.master')
@section('title', 'Announcements')
@section('content')

    @if ($announcements->count() > 0)
    @foreach ($announcements->sortByDesc('created_at') as $announcement)
    <h1>Announcements</h1>
        <div class="box box-warning">
                    <div class="box-header with-border bg-yellow">
                        <h4>Title: {{ $announcement->title }}</h4>
                        <h6>Viewer: {{ $announcement->viewer }} </h6>
                    </div>
                    <div class="box-body">
                        <p>Created: {{ $announcement->created_at->format('Y-m-d h:i:s A') }}</p> 
                       @if ($announcement->created_at->ne($announcement->updated_at))
                        <p>Updated: {{ $announcement->updated_at->format('Y-m-d h:i:s A') }}</p> 
                       @endif
                        <p>{{ $announcement->description }}</p>
                    </div>

                    <div class="box-footer">
                        <div class="pull-right">
                    <form method="POST" action="/home/announcements/{{$announcement->announcement_id}}">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <a href="/home/announcements/{{ $announcement->announcement_id }}/edit/" class="btn btn-sm btn-primary btn-create">Edit</a>
                            <button class="btn btn-sm btn-outline-danger btn-create">Delete</button>
                        </div>
                    </div>
                
            
            <!-- /.box-body -->
        </div>
        </form>
          @endforeach
    <!-- /.content -->
        @else
            <h1>No Announcements</h1>
            @endif
       
 
@endsection
