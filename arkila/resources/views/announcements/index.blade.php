@extends('layouts.master')
@section('title', 'Announcements')
@section('content-header', 'Announcements')
@section('content')


    @foreach ($announcements->sortByDesc('created_at') as $key => $announcement)
        <div class="box">      
            <div class="box-body">
                <div class="box-warning">
                    <div class="box-header with-border bg-yellow">
                        <h4>Announcement {{ $key }}</h4>
                        <h7>Viewer: {{ $announcement->viewer }} </h7>
                    </div>
                        <h6>Created: {{ $announcement->created_at }}</h6>
                        <p>{{ $announcement->description }}</p>
                         
                    <div class="pull-right">  
                    <form method="POST" action="/home/announcements/{{$announcement->announcement_id}}">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <a href="/home/announcements/{{ $announcement->announcement_id }}/edit/" class="btn btn-sm btn-primary btn-create">Edit</a>
                            <button class="btn btn-sm btn-outline-danger btn-create">Delete</button>
                    
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        </form>
          @endforeach
    <!-- /.content -->
       
 
@endsection
