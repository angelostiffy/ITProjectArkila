@extends('layouts.customer_non_user')
@section('content')
<section id="mainSection" style="background-image: url('{{ URL::asset('img/background.jpg') }}');">
        <div class="container">
            <div class="heading text-center">
                <h2>Sign Up</h2>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" id="boxContainer">
                    <form class="contact100-form" action="{{route('register')}}" method="POST">
                        {{csrf_field()}}
                        <div class="wrap-input100{{ $errors->has('name') ? ' has-error' : '' }}" >
                            <input id="first_name" class="input100" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required>
                            @if ($errors->has('first_name'))
                                <span class="focus-input100">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif    
                        </div><!-- wrap-input100-->
                        <div class="wrap-input100{{ $errors->has('name') ? ' has-error' : '' }}" >
                            <input id="middle_name" class="input100" type="text" name="middle_name" value="{{ old('middle_name') }}" placeholder="Middle Name" required>
                            @if ($errors->has('middle_name'))
                                <span class="focus-input100">
                                    <strong>{{ $errors->first('middle_name') }}</strong>
                                </span>
                            @endif    
                        </div><!-- wrap-input100-->
                        <div class="wrap-input100{{ $errors->has('name') ? ' has-error' : '' }}" >
                            <input id="last_name" class="input100" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required>
                            @if ($errors->has('last_name'))
                                <span class="focus-input100">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif    
                        </div><!-- wrap-input100-->
                        <div class="wrap-input100{{ $errors->has('username') ? ' has-error' : '' }}">
                            <input id="customerUsername" class="input100" type="text" name="username" value="{{ old('username') }}" placeholder="Username" required>
                            @if ($errors->has('username'))    
                                <span class="focus-input100">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div><!-- wrap-input100-->
                        <div class="wrap-input100">
                            <input id="customerEmail" class="input100" type="text" name="email" value="{{ old('email') }}" placeholder="Email Address">
                            @if ($errors->has('email'))
                                <span class="focus-input100">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif    
                        </div><!-- wrap-input100-->
                        <div class="wrap-input100{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="customerPassword" class="input100" type="password" name="password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="focus-input100">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif    
                        </div><!-- wrap-input100-->
                        <div class="wrap-input100">
                            <input id="customerRepeatPassword" class="input100" type="password" name="password_confirmation" placeholder="Repeat Password" required>
                            <span class="focus-input100"></span>
                        </div><!-- wrap-input100-->
                        <div class="container-contact100-form-btn">
                            <button type="submit" class="contact100-form-btn"><strong>Sign Up</strong></button>
                        </div><!-- container-contact100-form-btn-->
                    </form>
                    <!-- contact100-form-->
                </div>
                <!-- boxContainer-->
            </div>
            <!-- row-->
        </div>
        <!-- container-->
    </section>
    <!--    main section-->

@stop