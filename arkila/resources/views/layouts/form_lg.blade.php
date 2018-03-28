<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ban Trans | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    @section('links')
        @include('layouts.partials.stylesheets_form')
        <style>
    input.parsley-success,
select.parsley-success,
textarea.parsley-success {
  color: #468847;
  background-color: #DFF0D8;
  border: 1px solid #D6E9C6;
}

input.parsley-error,
select.parsley-error,
textarea.parsley-error {

  border: 1px solid red;
}

.parsley-errors-list {
  margin: 2px 0 3px;
  padding: 0;
  list-style-type: none;
  font-size: 0.9em;
  line-height: 0.9em;
  opacity: 0;
  
  transition: all .3s ease-in;
  -o-transition: all .3s ease-in;
  -moz-transition: all .3s ease-in;
  -webkit-transition: all .3s ease-in;
}

.parsley-errors-list.filled {
  opacity: 1;
}

.form-section {
  display: none;
}

.form-section.current {
display:inherit;
  }
  </style>
    @show
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        @include('layouts.partials.header_2')
        <!-- Full Width Column -->
        <div class="content- bgform-image">
            <div class="container">

                <form id="@yield('form-id')" class="parsley-form" action="@yield('form-action')" method="POST" data-parsley-validate="">
                {{csrf_field()}}
                @yield('method_field')

                <section class="content">
                @yield('form-body')

                <div class="modal fade" id="form-modal">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
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
        @include('layouts.partials.scripts_form')
        @include('message.error')
    @show
</body>

</html>
