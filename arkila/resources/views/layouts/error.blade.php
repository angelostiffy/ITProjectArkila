<!DOCTYPE html>
<html>

<head>
 @include('layouts.partials.stylesheets')

</head>

<body class="wrapper" style="background-color:#ecf0f5">

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!--/ .content -->

    <!-- ./wrapper -->
    @include('layouts.partials.scripts')

</body>

</html>