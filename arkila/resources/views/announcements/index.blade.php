@extends('layouts.master') 
@section('title', 'Announcements') 
@section('content') 
@if ($announcements->count() > 0) 

@include('message.error')
    @foreach ($announcements->sortByDesc('created_at') as $announcement)

    <div class="box box-warning">
        <div class="box-header with-border bg-light">
            <h3>Title: {{ $announcement->title }}</h3>
            <h5>Viewer: {{ $announcement->viewer }} </h5>
            <h5>Created: {{ $announcement->created_at->format('Y-m-d h:i:s A') }}</h5>
            @if ($announcement->created_at->ne($announcement->updated_at))
            <h5>Updated: {{ $announcement->updated_at->format('Y-m-d h:i:s A') }}</h5>
            @endif

        </div>
        <div class="box-body" style=" display:inline-block;">
            <div style="font-size:10">{{ $announcement->description }}</div >
        </div>

        <div class="box-footer">
            <div class="pull-right">
                <a href="/home/announcements/{{ $announcement->announcement_id }}/edit/" class="btn btn-primary btn-create"><i class="fa fa-pencil"></i>Edit</a>
                <button class="btn btn-outline-danger btn-create" data-toggle="modal" data-target="#{{'announcement'.$announcement->announcement_id}}"><i class="fa fa-trash"></i>Delete</button>

            </div>
        </div>
        <!-- Modal for Delete-->
        <div class="modal fade" id="{{'announcement'.$announcement->announcement_id}}">
            <div class="modal-dialog">
                <div class="col-md-offset-2 col-md-8">
                    <div class="modal-content">
                        <div class="modal-header bg-red">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Confirm</h4>
                        </div>
                        <div class="modal-body row" style="margin: 0% 1%;">
                            <div class="col-md-2" style="font-size: 35px; margin-top: 7px;">
                                <i class="fa fa-exclamation-triangle pull-left" style="color:#d9534f;">  </i>
                            </div>
                            <div class="col-md-10">
                                <p style="font-size: 110%;">Are you sure you want to delete this Announcement?</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="/home/announcements/{{$announcement->announcement_id}}">
                                {{csrf_field()}} 
                                {{method_field('DELETE')}}

                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                <button type="submit" name="driverArc" value="Arch" class="btn btn-danger" style="width:22%;">Delete</button>

                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->  
    </div>

    @endforeach
    <!-- /.content -->
@else
<div class="container text-center" style="margin-top: 18%">
    <h1>No Announcement/s as of the moment</h1>
    <p>To add announcement click on the Megaphone icon located at top right corner of the page. (beside the profile icon)</p>
</div>
@endif 
@endsection