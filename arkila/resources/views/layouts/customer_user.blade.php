<!DOCTYPE html>
<html>

<head>
	@section('links')
 		@include('layouts.partials.customer_stylesheets')	
	@show
</head>

<body>
        @include('layouts.partials.customer_header_user')


            <!-- Main content -->
              @yield('content')
            <!--/ .content -->

        @include('layouts.partials.customer_footer')


    <!-- ./wrapper -->
    @section('scripts')
	    @include('layouts.partials.customer_scripts')
		@include('message.error')
		@include('message.success')

		
	@show
</body>

</html>