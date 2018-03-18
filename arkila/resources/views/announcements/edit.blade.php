@extends('layouts.form')
@section('title', 'Edit Announcement')
@section('back-link', URL::previous())
@section('form-action', route('announcements.update', [$announcement->announcement_id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'Edit Announcement')
@section('form-body')

<div class="container" style="padding: 4% 10% 2% 4%">
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
    
</div>

@endsection
@section('form-btn')
    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-modal" data-keyboard="true">Save Changes</a>
@endsection

@section('modal-title','Confirm')
@section('modal-body')
    <p>Are you sure you want to overwrite the changes?</p>
@endsection

@section('modal-btn')
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary" style="width:33%;">Submit</button>
@endsection

@section('scripts') 
@parent
    <script>
        $(document).keypress(function(event){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                $('#form-modal').modal('toggle');
            }
        });   
    </script>

@endsection