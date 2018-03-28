<!DOCTYPE html>
<html>

<head>
 @include('layouts.partials.stylesheets')

</head>

<body class="hold-transition skin-blue sidebar-mini fixed">
    <div class="wrapper">
        @include('layouts.partials.header')

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.partials.main_sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper bg-image">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('content-header')
                </h1>
            </section>
            <!-- / .content-header -->

            <!-- Main content -->
            <section class="content">
              @yield('content')
            </section>
            <!--/ .content -->
        </div>


        <!-- /.content-wrapper -->
        @include('layouts.partials.footer')

        <!-- Van Queue Sidebar -->
        @include('layouts.partials.queue_sidebar')
        <!-- /.queue-sidebar -->
        
    </div>

    <!-- ./wrapper -->
     @include('layouts.partials.scripts')

</body>

</html>