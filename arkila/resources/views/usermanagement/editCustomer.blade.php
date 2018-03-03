@extends('layouts.form')
@section('title', 'Manange Users')
@section('back-link', URL::previous())
@section('form-action', route('customer.update', [$customer_user->id]))
@section('method_field', method_field('PATCH'))
@section('form-title', 'Manage Account')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">

@stop
@section('content')
@section('form-body')
          

<div class="form-group">
  <label for="payor">User name:</libel>
  <span name="username">{{$customer_user->username}}</span>
</div>
<div class="form-group">
  <label for="Particulars">Name:</label>
  <span name="fullname">{{$customer_user->name}}</span>
</div>
<div class="form-group">
  <label for="Particulars">Email Address:</label>
  <span name="email">{{$customer_user->email}}</span>
</div>          


<div class="well">                          
  <div class="box-body no-padding">
    <ul class="nav nav-pills nav-stacked">
      <li><a href="#"><i class="fa fa-inbox"></i> Enable/Disable Account
        <span class="label pull-right">         
          <label class="switch">
            <input type="checkbox" class="status" data-id="{{$customer_user->id}}" @if ($customer_user->status == 'enable') checked @endif>
            <span class="slider round"></span>
          </label>
        </span></a>
      </li>
    </ul>
  </div>

  <button type="button" class="btn btn-danger btn-block" style="margin-top:5%" data-toggle="modal" data-target="#form-modal">Reset Password</button>  

  @section('modal-title','Alert')
  @section('modal-body')
    <p>Are you sure you want to Reset "NAME"'s password?</p>
  @endsection

  @section('modal-btn')
    <button type="submit" class="btn btn-primary">Yes</button>
    <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
  @endsection 

</div>
                   
@endsection

@section('scripts')
@parent
    <style>
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
    }

    /* Hide default HTML checkbox */

    .switch input {
        display: none;
    }

    /* The slider */

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: gray;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 15px;
        width: 18px;
        left: 5px;
        bottom: 3px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #0275d8;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(13px);
        -ms-transform: translateX(13px);
        transform: translateX(13px);
    }

    /* Rounded sliders */

    .slider.round {
        border-radius: 100px;
    }

    .slider.round:before {
        border-radius: 80%;
    }
</style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.status').on('click', function(event){
          id = $(this).data('id');
          $.ajax({
            type: 'POST',
            url: "{{ URL::route('changeCustomerStatus') }}",
            data: {
              '_token': $('input[name=_token]').val(),
              'id': id
            },
            success: function(data){
              //empty
            },
          });
        });
      });
    </script>
@endsection