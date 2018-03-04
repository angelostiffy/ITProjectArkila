@extends('layouts.master')
@section('title', 'Announcements')
@section('content')

    @if ($announcements->count() > 0)
    @foreach ($announcements->sortByDesc('created_at') as $announcement)
        <div class="box box-warning">
                    <div class="box-header with-border bg-light">
                        <h4>Title: {{ $announcement->title }}</h4>
                        <h6>Viewer: {{ $announcement->viewer }} </h6>
                        <h6>Created: {{ $announcement->created_at }}</h6>
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
                            <a href="/home/announcements/{{ $announcement->announcement_id }}/edit/" class="btn btn-primary btn-create"><i class="fa fa-pencil"></i>Edit</a>
                            <button class="btn btn-outline-danger btn-create" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i>Delete</button>
                        </form>    
                        </div>
                    </div>
                
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Confirmation</h4>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete this announcement?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-danger">Delete</button>  
                  </div>
                </div>

              </div>
            </div>                
            
            <!-- /.box-body -->
        </div>
        </form>
          @endforeach
    <!-- /.content -->
        @else
        <div class="container text-center" style="margin-top: 18%">
            <h1>No Announcement/s as of the moment</h1>
            <p>To add announcement click on the Megaphone icon located at top right corner of the page. (beside the profile icon)</p>
        </div>   
        @endif
       
 
@endsection
