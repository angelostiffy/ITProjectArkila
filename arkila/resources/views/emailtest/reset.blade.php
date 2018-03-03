@extends('layouts.form_lg') @section('title', 'asdasd') @section('form-title', 'Hello!') @section('form-body')
<!--Start confirm password box-->
<div style="margin-left:20%; margin-right:20%;">
    <div class="box box-solid box-primary">
        <div class="box-header">
            <h1 class="box-title">Reset Password</h1>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form class="form-horizontal" action="/action_page.php">
                <div class="row form-group">
                    <label class="control-label col-sm-3">Old Password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter old password">
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row form-group">
                    <label class="control-label col-sm-3">New Password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter new password">
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row form-group">
                    <label class="control-label col-sm-3">Repeat New Password:</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter new password">
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row form-group pull-right">
                    <div>
                        <button type="submit" class="btn btn-flat btn-primary">Submit</button>
                    </div>
                </div>
                <!-- /.row -->
            </form>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection