 @extends('layouts.driver') 
 @section('title', 'Driver Report') 
 @section('content-title', 'Driver Report') 
 @section('content')
 
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3>Choose Terminal</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">Cabanatuan</a>
                        <a href="#" class="list-group-item list-group-item-action">San Jose</a>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-primary btn-group-justified">Select Terminal</button>
            </div>
            <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

@endsection