@extends('layouts.master')
@section('title', 'List of Van') 
@section('content-header', 'List of Van Units')


@section('content')
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
    	<div class="col-md-6">
    		<a href="{{route('vans.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Create Van</a>
    	</div>

    	<div class="modal fade" id="modal-default">
                    <div class="modal-dialog" style="width:400px;">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"> YUNG OPERATOR NAME</h4>
                            </div>
                            <!-- /.modal-header -->
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Choose Driver</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body center-block">
                                            <div class="form-group ">
                                                <select class="form-control">
                                                  <option selected="selected">Shaina</option>
                                                  <option>Marie</option>
                                                  <option>Retuya</option>
                                                  <option>Ganda</option>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" name="search" id="search-btn" class="btn btn-primary pull-right"> Submit </button>
                                        </div>
                                        <!-- /.box-footer -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.modal-body -->
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

        <table id="van" class="table table-bordered table-striped">
            <thead>
                <tr>
				    <th>Plate Number</th>
				    <th>Driver</th>
				    <th>Operator</th>
				    <th>Model</th>
				    <th>Seating Capacity</th>
				    <th>Actions</th>
				</tr>
            </thead>
            <tbody>
                @foreach($vans as $van)
						<tr>
							<td>{{$van->plate_number}}</td>

							<td>
							{{ $van->driver()->first()->full_name ?? $van->driver()->first() }}
							</td>
							<td>{{ $van->operator()->first()->full_name }}</td>
							<td>{{$van->model}}</td>
							<td>{{$van->seating_capacity}}</td>
							<td>
								<div class="text-center">
                                    <a href="changeDriver.html" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-pencil-square-o"></i> Change Driver</a>
                                    <a href="viewVanOperator.html" class="btn btn-default"><i class="fa fa-eye"></i>View</a>
                                    <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</i></button>
                                </div>
							</td>
						</tr>
					@endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 
@section('scripts') 
@parent

<script>
    $(function() {
        $('#van').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })
</script>

@stop