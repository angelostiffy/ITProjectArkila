@extends('layouts.master')
@section('title', 'Archive')
@section('content')
    {{session(['opLink'=> Request::url()])}} 

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#operator" data-toggle="tab">Operators</a></li>
        <li><a href="#drivers" data-toggle="tab">Drivers</a></li>
        <li><a href="#vans" data-toggle="tab">Vans</a></li>
    </ul>
    <div class="tab-content">
        
    <div class="active tab-pane" id="operator">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped driverVan">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($operators as $operator)
                        <tr>
                            <td>{{ $operator->operator->full_name }}</td>
                            <td>{{ $operator->operator->contact_number }}</td>
                            <td>{{ $operator->operator->address }}</td>                             
                            <td>
                                <div class="text-center">
                                    <a href="{{ route('archive.showProfile', [$operator->archive_member_id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{'deleteWarning'.$operator->operator_id}}"><i class="fa fa-trash"></i> Delete</button>
                                </div>
                                <!-- /.text -->
                            </td>
                        </tr>
                        <!-- Modal for Delete-->
                        <div class="modal fade" id="{{'deleteWarning'.$operator->operator_id}}">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header bg-red">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                        <h4 class="modal-title"> Confirm</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h1>
                                            <i class="fa fa-exclamation-triangle pull-left text-yellow"></i>
                                        </h1>
                                        <p>Are you sure you want to delete "{{ $operator->operator->full_name }}"</p>
                                    </div>
                                    <div class="modal-footer">
                                        @if($operators && $operator)
                                        <form action="{{ route('operators.archiveOperator', [$operator->member_id]) }}" method="POST">
                                            {{ csrf_field() }}
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                                <!-- /.col -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        @endforeach
                    </tbody>
                </table>

                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.tab-pane -->
    </div>
        
        <div class="tab-pane" id="drivers">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped driverVan">

                        <thead>
                            <tr>
                                <th>Operator</th>
                                <th>Plate No.</th>
                                <th>Contact Number</th>
                                <th>Operator</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($operators as $operator)
                            <tr>
                                <td>{{ $operator->operator->full_name }}</td>
                                <td>{{ $operator->archiveVan()->first()->plate_number ?? $operator->archiveVan()->first()}}</td>
                                <td>{{ $operator->operator->contact_number }}</td>
                                <td>Aw</td>
                                <td>
                                    <div class="text-center">
                            
                                        <a href="#" class="btn btn-default"><i class="fa fa-eye"></i>View</a>

                                        <button class="btn btn-danger" data-toggle="modal" data-target="#('deleteDriver'. $operator->operator_id)"><i class="fa fa-trash"></i> Delete</button>
                                    </div>

                                </td>
                            </tr>

                            <!--DELETE MODAL MIGUEL-->
                            <div class="modal fade" id="('deleteDriver'. $operator->operator_id)">
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
                                                        <p style="font-size: 110%;">Are you sure you want to delete "{{$operator->operator->full_name}}"</p>
                                                       </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        
                                                            <form method="POST" action="destroy">
                                                                {{csrf_field()}}
                                                                {{method_field('DELETE')}}
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                                <button type="submit" class="btn btn-danger" style="width:22%;">Yes</button>
                                                            </form>    
                                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-danger" style="width:22%;">Delete</button>

                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal -->
                                    @endforeach
                                    

                                </tbody>
                            </table>
                            
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.tab-pane -->
                </div>
                
                <div class="tab-pane" id="vans">
                    <div class="box">
                        <div class="box-header">
                            
                        </div>
                        <div class="box-body">
                            <table  class="table table-bordered table-striped driverVan">
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

                                    <tr>
                                        <td>a</td>
                                        <td>b</td>
                                        <td>c</td>
                                        <td>d</td>
                                        <td>e</td>
                                        <td>
                                            <div class="text-center">
                                                 
                                                    <a data-val='#' name="vanInfo" class="btn btn-default" data-toggle="modal" data-target="#modal-view"><i class="fa fa-eye"></i>View</a>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteVan"><i class="fa fa-trash"></i> Delete</button>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <!--DELETE MODAL MIGUEL-->
                                    <div class="modal fade" id="deleteVan">
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
                                                        
                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                                    
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
                            
            <!-- /.box -->
        </div>
        <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
</div>
<!-- /.nav-tabs-custom -->
@stop @section('scripts') @parent

<!-- DataTables -->
<script src="{{ URL::asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function() {
        $('.driverVan').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    });
</script>    
        
@stop
