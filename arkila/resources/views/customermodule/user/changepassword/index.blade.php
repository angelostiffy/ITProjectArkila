@extends('layouts.form')
@section('title', 'Edit Profile')
@section('form-title', 'EDIT PROFILE')
@section('form-action', route('customermodule.changePassword', [$customerId]))
@section('method_field', method_field('PATCH'))
@section('form-body')

    <div class="form-group">
      <input type="hidden" id="userid" value="{{$customerId}}">
        <label>Current Password:</label>
        <input id="current_password" name="current_password" type="password" class="form-control">
        <div id="pass_response" class="response"></div>
    </div>
    <div class="form-group">
        <label>New Password:</label>
        <input name="password" type="password" class="form-control">
    </div>
    <div class="form-group">
        <label>Confirm Password:</label>
        <input name="password_confirmation" type="password" class="form-control">
    </div>

@endsection
@section('form-btn')
    <button type="submit" class="btn btn-primary">Save Changes</button>
@endsection

@section('scripts')
@parent
<script type="text/javascript">
$('#current_password').keyup(function() {
    var id = $("#userid").val();
    var current_pass = $("#current_password").val();
    if (current_pass != '') {
        $('#pass_response').show();
        $.ajax({
            type: 'POST',
            url: "{{route('customermodule.checkCurrentPassword')}}",
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

</script>
@endsection
