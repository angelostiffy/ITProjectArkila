<!DOCTYPE html>
<html>
<head>
    <title>Resest Password</title>
</head>
 
<body>
<h2>Welcome to the site</h2>
<br/>
You received this email because you requested to reset your password, Please click on the below link to reset your password
<br/> 
<br/>
<a href="{{url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset())}}">Reset Password</a>
</body>
 
</html>