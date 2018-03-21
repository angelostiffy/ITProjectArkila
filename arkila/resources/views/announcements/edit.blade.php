@extends('layouts.form_lg')
@section('title', 'Edit Announcement')
@section('back-link', URL::previous())
@section('form-action', route('announcements.update', [$announcement->announcement_id]))
@section('method_field', method_field('PATCH'))
@section('form-id','regForm')
@section('form-title', 'Edit Announcement')
@section('form-body')

<div class="box box-warning" style="box-shadow: 0px 5px 10px gray;">   
    @include('message.error')

    <div class="box-header with-border text-center">
            <a href="{{route('announcements.index')}}" class="pull-left btn btn-default"><i class="fa  fa-chevron-left"></i></a>
            <h3 class="box-title">
                Edit Announcement
            </h3>
    </div>
    
    <div class="form-group" style="padding:3% 5% 5% 5%">
        <div class="form-group" style="margin:2% 0%">
            <label>Title: </label>
            <input type="text" name="title" value="{{ $announcement->title }}" maxlength="50">
            
            <div class="pull-right">
                <label>Viewer: {{ $announcement->announcement_id}}</label>
                <select name="viewer">
                <option value="Public"{{ $announcement->viewer == 'Public' ? 'selected="selected"' : '' }}>Public</option>
                <option value="Driver Only"{{ $announcement->viewer == 'Driver Only' ? 'selected="selected"' : '' }}>Driver Only</option>
                <option value="Customer Only"{{ $announcement->viewer == 'Customer Only' ? 'selected="selected"' : '' }}>Customer Only</option>
                <option value="Only Me"{{ $announcement->viewer == 'Only Me' ? 'selected="selected"' : '' }}>Only Me</option>
                </select>
            </div>
        </div>
        
        <textarea width="30%" class="form-control" rows="10" name="announce" maxlength="1000">{{ $announcement->description }}</textarea>
    
    
        <div class="box-footer">
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    
</div>


@endsection

