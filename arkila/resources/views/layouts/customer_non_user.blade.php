<!DOCTYPE html>
<html>

<head>
 @include('layouts.partials.customer_stylesheets')

</head>

<body>
        @include('layouts.partials.customer_header_non_user')


            <!-- Main content -->
              @yield('content')
            <!--/ .content -->

        @include('layouts.partials.customer_footer')


    <!-- ./wrapper -->
     @include('layouts.partials.customer_scripts')

</body>

</html>