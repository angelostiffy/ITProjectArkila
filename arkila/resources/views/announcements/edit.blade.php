@extends('layouts.master') 
@section('title', 'Edit Announcements') 
@section('content') 

<div class="container" style="padding: 4% 10% 2% 4%">

<form method="post" action="{{ route('announcements.update', $announcement->announcement_id) }}">
                        {{ csrf_field() }} {{ method_field('PATCH')}}    

        <h1 style="margin-bottom:2%">Edit Announcement</h1>
        <div class="form-group">
            <label>Title: </label>
            <input type="text" name="title" value="{{ $announcement->title }}">
            <label>Viewer: {{ $announcement->announcement_id}}</label>
            <select name="viewer">
        <option value="Public"{{ $announcement->viewer == 'Public' ? 'selected="selected"' : '' }}>Public</option>
        <option value="Driver Only"{{ $announcement->viewer == 'Driver Only' ? 'selected="selected"' : '' }}>Driver Only</option>
        <option value="Customer Only"{{ $announcement->viewer == 'Customer Only' ? 'selected="selected"' : '' }}>Customer Only</option>
        <option value="Only Me"{{ $announcement->viewer == 'Only Me' ? 'selected="selected"' : '' }}>Only Me</option>

    </select>
            <textarea width="30%" class="form-control" rows="10" name="announce">{{ $announcement->description }}</textarea>
        </div>

        <div class="pull-right">
            <a href="/home/announcements/" class="btn btn-md btn-default btn-create">Back</a>
            <button type="submit" data-toggle="modal" data-target="#{{'saveChanges'. $announcement->announcement_id }}" class="btn btn-primary">Save Changes</button>
        </div>

 
    
    <div class="modal fade" id="{{'saveChanges'. $announcement->announcement_id}}">
        <div class="modal-dialog">
            <div class="col-md-offset-2 col-md-8">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"> Confirm</h4>
                    </div>
                    <div class="modal-body row" style="margin: 0% 1%;">
                        <div>
                            <p style="font-size: 110%;">{{$announcement->announcement_id}}Are you sure you want to overwrite the changes?</p>
                        </div>
                    </div>
                    <div class="modal-footer">


                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" style="width:22%;">Submit</button>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.modal-dialog -->
       </form>
    </div>

</div>
@endsection