@extends('layouts.master')
@section('title', 'Announcements')
@section('content-header', 'Announcements')
@section('content')


    @foreach ($announcements->sortByDesc('created_at') as $key => $announcement)
        <div class="box box-warning">
                    <div class="box-header with-border bg-light">
                        <h4>Announcement {{ $key }}</h4>
                        <h6>Viewer: {{ $announcement->viewer }} </h6>
                        <h6>Created: {{ $announcement->created_at }}</h6>
                    </div>
                    <div class="box-body">
                        
                        <p>{{ $announcement->description }}</p>
                    </div>

                    <div class="box-footer">
                        <div class="pull-right">
                    <form method="POST" action="/home/announcements/{{$announcement->announcement_id}}">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <a href="/home/announcements/{{ $announcement->announcement_id }}/edit/" class="btn btn-sm btn-primary btn-create"><i class="fa fa-pencil"></i>Edit</a>
                            <button class="btn btn-sm btn-outline-danger btn-create"><i class="fa fa-trash"></i>Delete</button>
                        </div>
                    </div>
                
            
            <!-- /.box-body -->
        </div>
        </form>
          @endforeach
    <!-- /.content -->
       
 
@endsection
