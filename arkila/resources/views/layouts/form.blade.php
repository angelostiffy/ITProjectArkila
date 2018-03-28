<!DOCTYPE html>
<html>

<head>
    @section('links')
        @include('layouts.partials.stylesheets_form')
    @show
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        @include('layouts.partials.header_2')

        <!-- Full Width Column -->
        <div class="content-wrapper bgform-image">
                        <div class="container">
                    <section class="content">
                        <div class="login-box" style="box-shadow: 0px 5px 10px gray;">
                            <form action="@yield('form-action')" method="POST" data-parsley-validate="">
                            {{csrf_field()}} @yield('method_field')
                            <div class="login-logo">
                                <div class="col-md-1">
                                    <h3 style=":hover{color = green;}">
                                        <a href="@yield('back-link')">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                    </h3>
                                </div>
                                <div class="col-md-11">
                                    <h3>
                                        @yield('form-title')
                                    </h3>
                                </div>
                            </div>
                            <div class="login-box-body">
                                @yield('form-body')
                            </div>
                            <!-- /.login-box-body -->
                            <div class="box-footer">
                                @yield('others')
                                <div class="form-group pull-right">
                                    @yield('form-btn')
                                </div>
                            </div>
                            </form>
                        </div>
                        
                    </section>
                
            </div>
            <!-- /.container -->
        </div>
        <!-- /.content-wrapper -->


        @include('layouts.partials.footer')
    </div>
    <!-- ./wrapper -->

    @section('scripts')
        @include('layouts.partials.scripts_form')
        @include('message.error')
    @show
</body>
 
</html>