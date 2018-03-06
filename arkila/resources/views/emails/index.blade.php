<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
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

                        <a href="{{ $link = route('getResetPass', [$token,$email]) }}" class="btn btn-flat btn-primary">Reset Password</a>
                        
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
  </body>
</html>
