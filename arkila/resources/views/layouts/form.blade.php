<!DOCTYPE html>
<html>

<head>
    @section('links')
        @include('layouts.partials.stylesheets_form')
        <style>
            .form-box{
                width: 360px;
                margin: 7% auto;
                box-shadow: 0px 5px 10px gray;
            }

            .form-box-header{
                font-size: 25px;
                margin-bottom: auto;
                font-weight: 300;
                background: white;
                padding: 15px;
                border-top-right-radius: 3px;
                border-top-left-radius: 3px;
            }

            .form-box-body {
                background: #fff;
                padding: 15px;
                border-top: 0;
                color: #666;
            }

            .form-box-footer {
                border-top-left-radius: 0;
                border-top-right-radius: 0;
                border-bottom-right-radius: 3px;
                border-bottom-left-radius: 3px;
                border-top: 1px solid #f4f4f4;
                padding: 15px;
                background-color: #fff;
            }
        </style>
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
                        <div class="form-box">
                            <form action="@yield('form-action')" method="POST" data-parsley-validate="">
                            {{csrf_field()}} @yield('method_field')
                            <div class="form-box-header">
                                    <p>
                                        <a href="@yield('back-link')">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>
                                    <span class="text-center">
                                        @yield('form-title')
                                    </span>
                                    </p>
                            </div>
                            <div class="form-box-body">
                                @yield('form-body')
                            </div>
                            <!-- /.login-box-body -->
                            <div class="form-box-footer">
                                @yield('others')
                                <div class="form-group pull-right">
                                    @yield('form-btn')
                                </div>
                                <div class="clearfix"></div>
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