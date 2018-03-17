@extends('layouts.partials.style_links')
<div class="container">
    <div class="card card-container">
        <div id="userImg" class="text-center">
            <img id="imgSize" src="{{ URL::asset('img/user_icon.png') }}">
        </div>
        <form method="POST" action="/login">
          {{csrf_field()}}
            <input type="text" name="username" class="form-control" style="margin-bottom:3%" placeholder="Username" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" style="margin-bottom:8%" required>
            <div class="checkbox">
                
            </div>
            <button class="btn btn btn-primary btn-block" type="submit">Log in</button>
        </form>
        <!-- /form -->
        <a href="#" class="forgot-password pull-right">Forgot Password?</a>
    </div>
    <!-- /card-container -->
</div>
<!-- /container -->
@section('scripts') @parent
<style>
    body,
    html {
        height: 100%;
        background-repeat: no-repeat;
        background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
    }

    .card-container.card {
        max-width: 350px;
        padding: 40px 40px;
    }


    .card {
        background-color: #F7F7F7;
        padding: 20px 25px 30px;
        margin: 0 auto 25px;
        margin-top: 50px;
    }

    #userImg {
        margin-bottom: 20px;
    }

    #imgSize {
        width: 200px;
        height: 200px;

    }
</style>

@endsection
