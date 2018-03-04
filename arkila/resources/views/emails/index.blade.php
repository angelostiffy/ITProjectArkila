@extends('layouts.form_lg') @section('title', 'asdasd') @section('form-title', 'Hello!') @section('form-body')
<!--Start email box-->
<div style="margin-left:20%; margin-right:20%;">
    <div class="box box-solid box-primary">
        <div class="box-header">
            <h1 class="box-title">Hello!</h1>
        </div>
        <!-- /.box-header -->
        <div class="box-body text-center">
            <div class="row">
                <p>You are receiving this email because we received a password reset request for your account.</p>
            </div>
            <div class="row"> 
                    <button class="btn btn-flat btn-primary">Reset Password</button>
                
            </div>
            <!-- /.text-center -->
            <div class="row">
                <p>If you did not request a password reset, no further action is required.</p>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection