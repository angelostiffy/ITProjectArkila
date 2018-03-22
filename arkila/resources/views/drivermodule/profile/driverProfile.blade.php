@extends('layouts.driver') @section('title', 'Driver Profile') @section('content-title', 'Driver Home') @section('content')
<div class="col-md-offset-1 col-md-3">


    {{Session::get('error')}}
    @include('message.success')
    <!-- Profile Image -->
    <div class="box box-primary">
        <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="../dist/img/user4-128x128.jpg" alt="User profile picture">

            <h3 class="profile-username text-center">{{ $profile->first_name.' '.$profile->middle_name.' '.$profile->last_name }}</h3>

            <p class="text-muted text-center">1232gmailcom</p>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">


            <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-bell"></i> Notifications
                                              <span class="label pull-right">

                                                  <label class="switch">
                                                      <input type="checkbox" class="status" data-id="{{$profile->member_id}}"
                                                      @if($profile->notification === 'Enable') checked @endif>
                                                      <span class="slider round"></span>
                                                  </label>
                                              </span></a>
                </li>
            </ul>
            <div class="text-center">
                <button type="button" class="btn btn-primary btn-group-justified text-center" data-toggle="modal" data-target="#driverChangePassword">Change Password</button>
            </div>
            <!-- /.text -->

        </div>
        <!-- /.box-footer -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->

<div class="col-md-6">
    <div class="box">

        <div class="box-header">
            <h3 class="box-title">Personal Info</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="form-group" class="control-label">
                <label for="">Contact Number:</label>
                <input value="{{$profile->contact_number}}" id="" name="" type="text" class="form-control" disabled>
            </div>
            <!-- /.form -->
            <div class="form-group" class="control-label">
                <label for="">Address:</label>
                <input value="{{$profile->address}}" id="" name="" type="text" class="form-control" disabled>
            </div>
            <!-- /.form -->
            <div class="form-group" class="control-label">
                <label for="">Birthday:</label>
                <input value="{{$profile->birth_date}}" id="" name="" type="text" class="form-control" disabled>
            </div>
            <!-- /.form -->
            <div class="form-group" class="control-label">
                <label for="">Trips Completed:</label>
                <input value="{{$counter}}" id="" name="" type="text" class="form-control" disabled>
            </div>
            <!-- /.form -->
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<!-- /.col -->

<!--        CHANGE PASSWORD MODAL-->
<div class="modal fade" id="driverChangePassword">
    <div class="modal-dialog" style="margin-top:150px;">
        <div class="col-md-offset-2 col-md-8">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Change Password</h4>
                </div>
                <!-- /.modal-header -->
                <div class="modal-body">
                    <div class="box">
                        <div class="box-body">
                            <form action="{{route('drivermodule.changePassword',[$userId])}}" method="POST">
                                {{csrf_field()}} {{method_field('PATCH')}}

                                <div class="form-group" class="control-label">
                                    <input type="hidden" id="userid" value="{{$userId}}">
                                    <label for="">Current password:</label>
                                    <input value="" id="current_password" name="current_password" type="password" class="form-control">
                                    <div id="pass_response" class="response"></div>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group" class="control-label">
                                    <label for="">New Password:</label>
                                    <input value="" id="" name="password" type="password" class="form-control" required>
                                </div>
                                <!-- /.form-group -->

                                <div class="form-group" class="control-label">
                                    <label for="">Confirm New Password:</label>
                                    <input value="" id="" name="password_confirmation" type="password" class="form-control" required>
                                </div>
                                <!-- /.form-group -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.modal-body -->


                <div class="col-md-6">
                    <div class="box">

                        <div class="box-header">
                            <h3 class="box-title">Personal Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <div class="form-group" class="control-label">
                                <label for="">Contact Number:</label>
                                <input value="{{$profile->contact_number}}" id="" name="" type="text" class="form-control" disabled>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group" class="control-label">
                                <label for="">Address:</label>
                                <input value="{{$profile->address}}" id="" name="" type="text" class="form-control" disabled>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group" class="control-label">
                                <label for="">Birthday:</label>
                                <input value="{{$profile->birth_date}}" id="" name="" type="text" class="form-control" disabled>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group" class="control-label">
                                <label for="">Trips Completed:</label>
                                <input value="{{$counter}}" id="" name="" type="text" class="form-control" disabled>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->


                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-group-justified text-center">Submit</button>
                </div>
                <!-- /.modal-footer -->
                </form>
                <!-- /.form -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection @section('scripts') @parent

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
        background-color: #ccc;
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
        background-color: #2196F3;
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
    $(document).ready(function() {
        $('#current_password').keyup(function() {
            var id = $("#userid").val();
            var current_pass = $("#current_password").val();
            if (current_pass != '') {
                $('#pass_response').show();
                $.ajax({
                    type: 'POST',
                    url: "{{route('drivermodule.checkCurrentPassword')}}",
                    data: {
                        '_token': $('input[name=_token]').val(),
                        'id': id,
                        'current_password': current_pass,
                    },
                    success: function(response) {
                        if (response.success) {
                            $("#pass_response").html("<span class='not-exists'>* Correct.</span>");
                        } else {
                            $("#pass_response").html("<span class='exists'>Wrong</span>");
                        }
                    }
                });
            } else {
                $('#pass_response').hide();
            }

        });

        $('.status').on('click', function(event) {
            id = $(this).data('id');
            $.ajax({
                type: 'POST',
                url: "{{ route('drivermodule.notification') }}",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': id
                },
                success: function(data) {
                    //empty
                },
            });
        });


    });
</script>

@endsection
