@section('links')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}"/>
    
    <title>Ban Trans | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    {{ Html::style('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    <!-- Font Awesome -->
    {{ Html::style('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ Html::style('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}
    <!-- Select2 -->
    {{ Html::style('adminlte/bower_components/select2/dist/css/select2.min.css') }}
    <!-- Theme style -->
    {{ Html::style('adminlte/dist/css/AdminLTE.min.css') }}
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    {{ Html::style('adminlte/dist/css/skins/_all-skins.min.css') }}
    <!-- Morris chart -->
    {{ Html::style('adminlte/bower_components/morris.js/morris.css') }}
    <!-- jvectormap -->
    {{ Html::style('adminlte/bower_components/jvectormap/jquery-jvectormap.css') }}
    <!-- Date Picker -->
    {{ Html::style('adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}
    <!-- Daterange picker -->
    {{ Html::style('adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}
    <!-- bootstrap wysihtml5 - text editor -->
    {{ Html::style('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}
    <!-- DataTables -->
    {{ Html::style('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!-- Google Font -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- style.css -->
    {{ Html::style('css/style.css') }}
@show
        
    
 
 
    