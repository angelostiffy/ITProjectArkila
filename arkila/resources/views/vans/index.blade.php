@extends('layouts.master')
@section('title', 'List of Van') 
@section('content-header', 'List of Van Units')
@if(session()->get('opLink')) {{ session()->forget('opLink') }} @endif

@section('content')
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
    	<div class="col-md-6">
    		<a href="{{route('vans.create')}}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> REGISTER VAN</a>
            <a href=""  class="btn btn-default btn-sm btn-flat"> <i class="fa fa-print"></i> PRINT</a>
    	</div>

        <table id="van" class="table table-bordered table-striped">
            <thead>
                <tr>
				    <th>Plate Number</th>
				    <th>Driver</th>
				    <th>Operator</th>
				    <th>Model</th>
				    <th>Seating Capacity</th>
				    <th class="text-center">Actions</th>
				</tr>
            </thead>
            <tbody>
                @foreach($vans->where('status', 'Active') as $van)
						<tr>
							<td>{{$van->plate_number}}</td>
							<td>
							{{ $van->driver()->first()->full_name ?? $van->driver()->first() }}
							</td>
							<td>{{ $van->operator()->first()->full_name ??  $van->operator()->first()}}</td>
							<td>{{$van->model}}</td>
							<td class="pull-right">{{$van->seating_capacity}}</td>
							<td>
								<div class="text-center">
	                               
                                    <a data-val='{{$van->plate_number}}' name="vanInfo" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-view"><i class="fa fa-eye"></i> VIEW</a>
                                    
                                    @if($van->driver()->first())
                                            <a name="listDriver" data-driver="{{$van->driver->first()->member_id}}" data-val="{{ $van->operator()->first()->member_id ?? $van->operator()->first()}}" class="btn btn-outline-secondary btn-sm btn-driver" data-toggle="modal" data-target="#edit-modal"><i class="fa fa-exchange"></i> CHANGE DRIVER</a>
                                    @else
                                        <a href="{{ route('vans.edit',[$van->plate_number] ) }}" class="btn btn-outline-secondary btn-sm btn-driver"><i class="fa fa-user-plus"></i> ADD DRIVER</a>
                                    @endif
                                    
                                    <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#{{ 'deleteWarning'. $van->plate_number }}"><i class="fa fa-trash"></i> DELETE</button>

		                        </div>

							</td>
						</tr>
                        
                        
					@endforeach
            </tbody>
        </table>

        @foreach($vans->where('status', 'Active') as $van)
        <!-- MODAL DELETION -->
            <div class="modal fade" id="{{ 'deleteWarning'. $van->plate_number }}">
                <div class="modal-dialog">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="modal-content">
                            <div class="modal-header bg-red">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                <h4 class="modal-title"> Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <h3>  
                                   <i class="fa fa-exclamation-triangle pull-left text-yellow"></i>
                                </h3>
                                <p>Are you sure you want to delete "{{ $van->model }}" with plate number of "{{$van->plate_number}}"</p>
                            </div>
                            <div class="modal-footer">
                                <form method="POST" action="{{route('vans.archiveDelete',[$van->plate_number])}}">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                </form>    
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
    @endforeach

        <div class="modal fade" id="modal-view">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                        <h4 class="modal-title">Van Details</h4>
                    </div>
                    <!-- /.modal-header -->
                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-5">
                                    <label for="#plateNumber">Plate Number:</label>    
                                </div>
                                <div class="col-md-7">
                                    <p id="plateNumber" class="info-container" disabled></p>
                                </div>
                                
                                
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">
                                    <label for="#vanModel">Van Model:</label>
                                </div>
                                <div class="col-md-7">
                                    <p id="vanModel" class="info-container" disabled> </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">
                                    <label for="seatingCapacity">Seating Capacity:</label>
                                </div>
                                <div class="col-md-7">
                                    <p id="seatingCapacity" class="info-container" disabled></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5">
                                    <label for="vanOperator">Operator:</label>
                                </div>
                                <div class="col-md-7">
                                    <p id="vanOperator" class="info-container" disabled></p>
                                </div>
                            </div>
                            <div class="form-group">
                                 <div class="col-md-5">
                                     <label for="vanDriver">Driver:</label>
                                 </div>
                                 <div class="col-md-7">
                                     <p id="vanDriver" type="text" class="info-container" disabled></p>
                                 </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="search" id="search-btn" class="btn btn-default pull-right" data-dismiss="modal"> Back </button>
                    </div>
                    <!-- /.modal-body -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>

@endsection 
@section('scripts') 
@parent

<script>
    $(document).ready(function() {
        $('#van').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            'order': [[ 1, "desc" ]],
            'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [-1] /* 1st one, start by the right */
            }]
        });


    $('a[name="listDriver"]').on('click',function(e){
        $('select[name="driver"]').empty();
        $.ajax({
            method:'POST',
            url: '{{route("vans.listDrivers")}}',
            data: {
                '_token': '{{csrf_token()}}',
                'operator':$(e.currentTarget).data('val'),
                'vanDriver': $(e.currentTarget).data('driver')
            },
            success: function(drivers){

                $('#OpName').text($(e.currentTarget).closest('tr').find('td')[2].textContent);
                $('#formChangeDriver').attr('action',"/home/vans/"+$(e.currentTarget).closest('tr').find('td')[0].textContent);
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
                $('#vanOperator').text(vanInfo.operatorOfVan);
                $('#vanDriver').text(vanInfo.driverOfVan);
            }

        });
    });

    });
</script>

@endsection