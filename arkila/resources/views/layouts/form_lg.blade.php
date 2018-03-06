<!DOCTYPE html>
<html>

<head>
    @section('links')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ban Trans | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/iCheck/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ URL::asset('adminlte/dist/css/skins/_all-skins.min.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- style.css -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    @show
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        @include('layouts.partials.header_2')
        <!-- Full Width Column -->
        <div class="content-wrapper">
            <div class="container">

                <form id="@yield('form-id')" action="@yield('form-action')" method="POST">
                {{csrf_field()}}
                @yield('method_field')

                <section class="content">
                @yield('form-body')

                <div class="modal fade" id="form-modal">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"> @yield('modal-title') </h4>
                            </div>
                            <!-- /.modal-header -->
                            <div class="modal-body">
                                @yield('modal-body')
                            </div>
                            <!-- /.modal-body -->
                            <div class="modal-footer">
                                @yield('modal-btn')
                            </div>
                            <!--/.modal-foorer -->
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                </section>
                </form>
            </div>
            <!-- /.container -->

        </div>
        <!-- /.content-wrapper -->

        @include('layouts.partials.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    @section('scripts')
    <script src="{{ URL::asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ URL::asset('adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ URL::asset('adminlte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ URL::asset('adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ URL::asset('adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ URL::asset('adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ URL::asset('adminlte/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ URL::asset('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ URL::asset('adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ URL::asset('adminlte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ URL::asset('adminlte/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ URL::asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ URL::asset('adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ URL::asset('adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('adminlte/dist/js/demo.js') }}"></script>


    @show
</body>

</html>
