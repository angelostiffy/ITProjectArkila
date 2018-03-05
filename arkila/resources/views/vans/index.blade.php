@extends('layouts.master')
@section('title', 'List of Van') 
@section('content-header', 'List of Van Units')
@if(session()->get('opLink')) {{ session()->forget('opLink') }} @endif

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
                                <h4 id="OpName" class="modal-title"></h4>
                            </div>
                            <!-- /.modal-header -->
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="box box-default">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Choose Driver</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <form id="formChangeDriver" method="POST" action="">
                                            {{ csrf_field() }}
                                            {{ method_field("PATCH") }}
                                            <div class="box-body center-block">
                                                <div class="form-group ">
                                                    <select name="driver" class="form-control"></select>
                                                </div>
                                                <!-- /.form-group -->
                                            </div>
                                            <!-- /.box-body -->
                                            <div class="box-footer">
                                                <button type="submit" name="search" id="search-btn" class="btn btn-primary pull-right"> Submit </button>
                                            </div>
                                        </form>
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

        <div class="modal fade" id="modal-view">
            <div class="modal-dialog" style="width:400px;">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 id="viewVanOp" class="modal-title"></h4>
                    </div>
                    <!-- /.modal-header -->
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="box box-default">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Van Details</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body center-block">
                                    <div class="form-group">
                                        <label for="operatorLastName">Plate Number:</label>
                                        <p id="plateNumber" name="driverLastName" class="form-control" placeholder="Plate Number" disabled> </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="contactNumberO">Van Model:</label>
                                        <p id="vanModel" name="vanModel" class="form-control" placeholder="Van Model" disabled> </p>
                                    </div>
                                    <div class="form-group">
                                        <label for="ageO">Seating Capacity:</label>
                                        <p id="seatingCapacity" name="seatingCapacity" class="form-control" placeholder="Age" disabled></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="genderO">Operator:</label>
                                        <p id="operatorOfVan" name="operator" class="form-control" placeholder="Gender" disabled></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="sssO">Driver:</label>
                                        <p id="driverOfVan" name="Driver" type="text" class="form-control" placeholder="SSS No." disabled></p>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="search" id="search-btn" class="btn btn-default pull-right"> Back </button>
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
									<form method="POST" action="{{route('vans.destroy',[$van->plate_number])}}">
									{{csrf_field()}}
									{{method_field('DELETE')}}

                                        @if($van->driver()->first())
		                                        <a name="listDriver" data-val="{{ $van->operator()->first()->member_id }}" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Change Driver</a>
                                        @else
                                            <a href="{{ route('vans.edit',[$van->plate_number] ) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>Add Driver</a>
                                        @endif
                                        <a data-val='{{$van->plate_number}}' name="vanInfo" class="btn btn-default" data-toggle="modal" data-target="#modal-view"><i class="fa fa-eye"></i>View</a>
									<button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
								</form>
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



        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteWarning">Delete</button>


        <div class="modal fade" id="deleteWarning">
            <div class="modal-dialog">
                <div class="col-md-offset-2 col-md-8">
                    <div class="modal-content">
                        <div class="modal-header bg-red">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Confirm</h4>
                        </div>
                        <div class="modal-body row" style="margin: 0% 1%;">
                           <div class="col-md-2" style="font-size: 35px; margin-top: 7px;">
                               <i class="fa fa-exclamation-triangle pull-left" style="color:#d9534f;">  </i>
                           </div>
                           <div class="col-md-10">
                            <p style="font-size: 110%;">Are you sure you want to delete "yung user para pogi"</p>
                           </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-danger" style="width:22%;">Yes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        
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
    });

    $('a[name="listDriver"]').on('click',function(e){
        $('select[name="driver"]').empty();
        $.ajax({
            method:'POST',
            url: '{{route("vans.listDrivers")}}',
            data: {
                '_token': '{{csrf_token()}}',
                'operator':$(e.currentTarget).data('val')
            },
            success: function(drivers){

                $('#OpName').text($(e.currentTarget).parents().eq(2).siblings().eq(2).text());
                $('#formChangeDriver').attr('action',"/home/vans/"+$(e.currentTarget).parents().eq(2).siblings().eq(0).text());
                $('select[name="driver"]').append('<option value="">None</option>');

                drivers.forEach(function(driverObj){
                    $('select[name="driver"]').append('<option value='+driverObj.id+'> '+driverObj.name+'</option>');
                });

            }

        });
    });

    $('a[name="vanInfo"]').on('click',function(e){
        $.ajax({
            method:'POST',
            url: '{{route("vans.vanInfo")}}',
            data: {
                '_token': '{{csrf_token()}}',
                'van':$(e.currentTarget).data('val')
            },
            success: function(vanInfo){
                $('#plateNumber').text(vanInfo.plateNumber);
                $('#vanModel').text(vanInfo.vanModel);
                $('#seatingCapacity').text(vanInfo.seatingCapacity);
                $('#operatorOfVan').text(vanInfo.operatorOfVan);
                $('#driverOfVan').text(vanInfo.driverOfVan);
            }

        });
    });
</script>

@stop