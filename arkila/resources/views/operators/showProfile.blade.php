@extends('layouts.master') @section('title', 'Show Profile') @section('content')
    {{session(['opLink'=> Request::url()])}}

<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset('img/jl.JPG') }}" alt="User profile picture">

                <h3 class="profile-username text-center">{{ $operator->full_name }}</h3>
                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>ID</b> <a class="pull-right">{{ $operator->member_id }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Contact Number</b> <a class="pull-right">{{ $operator->contact_number }}</a>
                    </li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">       
                <a href="{{route('operators.show',[$operator->member_id])}}" class="btn btn-default btn-block"><b>View All Information</b></a>
                <a href="{{route('operators.edit',[$operator->member_id])}}" class="btn btn-block btn-primary"><b>Edit Information</b></a>


                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog" style="width:400px;">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">{{ $operator->full_name }}</h4>
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
                <!-- /.modal-fade -->

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


            </div>
            <!-- /.box-header -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#drivers" data-toggle="tab">Drivers</a></li>
                <li><a href="#vans" data-toggle="tab">Vans</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="drivers">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <a href="{{route('drivers.createFromOperator',[$operator->member_id])}}" class="btn btn-primary" style="margin-bottom:-5%;"><i class="fa fa-plus-circle"></i> Add Driver</a>
                            <table id="driver" class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Contact Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($operator->drivers as $driver)
                                    <tr>
                                        <td>{{$driver->full_name}}</td>
                                        <td>{{$driver->age}}</td>
                                        <td>{{$driver->contact_number}}</td>
                                        <td>

                                            
                                                <div class="text-center">
                                                    <a href="{{route('drivers.edit',[$driver->member_id])}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>Edit</a>
                                                    <a href="{{route('drivers.show',[$driver->member_id])}}" class="btn btn-default"><i class="fa fa-eye"></i>View</a>
                                                   
                                                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#{{ 'deleteDriver'.$operator->member_id }}"><i class="fa fa-trash"></i> Delete</button>
                                                </div>                                                
                                        </td>
                                    </tr>
                                    
                                    <!--DELETE MODAL MIGUEL-->
                                    <div class="modal fade" id="{{ 'deleteDriver'.$operator->member_id }}">
                                        <div class="modal-dialog">
                                            <div class="col-md-offset-2 col-md-8">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-red">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title"> Confirm</h4>
                                                    </div>
                                                    <div class="modal-body row" style="margin: 0% 1%;">
                                                       <div class="col-md-2" style="font-size: 35px; margin-top: 7px;">
                                                           <i class="fa fa-exclamation-triangle pull-left" style="color:#d9534f;">  </i>
                                                       </div>
                                                       <div class="col-md-10">
                                                        <p style="font-size: 110%;">Are you sure you want to delete "{{ $driver->full_name }}"</p>
                                                       </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('drivers.destroy',[$driver->member_id])}}" method="POST">
                                                             {{ csrf_field() }} {{method_field('DELETE')}}
                                                            
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-danger" style="width:22%;">Delete</button>
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
                            <a href="{{route('vans.createFromOperator',$operator->member_id)}}" class="btn btn-primary" style="margin-bottom:-8%;"><i class="fa fa-plus-circle"></i> Add Van</a>
                        </div>
                        <div class="box-body">
                            <table id="van" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Plate Number</th>
                                        <th>Driver</th>
                                        <th>Model</th>
                                        <th>Seating Capacity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($operator->van as $van)
                                    <tr>
                                        <td>{{$van->plate_number}}</td>
                                        <td>{{$van->driver()->first()->full_name ?? $van->driver()->first()}}</td>
                                        <td>{{$van->model}}</td>
                                        <td>{{$van->seating_capacity}}</td>
                                        <td>
                                            <div class="text-center">
                                                
                                                    @if($van->driver()->first())
                                                        <a name="listDriver" data-val="{{ $van->operator()->first()->member_id }}" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Change Driver</a>
                                                    @else
                                                        <a href="{{ route('vans.edit',[$van->plate_number] ) }}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>Add Driver</a>
                                                    @endif
                                                    <a data-val='{{$van->plate_number}}' name="vanInfo" class="btn btn-default" data-toggle="modal" data-target="#modal-view"><i class="fa fa-eye"></i>View</a>
                                                    <button class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteVan"><i class="fa fa-trash"></i> Delete</button>
                                                
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
                                                        
                                                       <form method="POST" action="{{route('vans.destroy',[$van->plate_number])}}">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}

                                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-danger" style="width:22%;">Delete</button>
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
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    

    @stop @section('scripts') @parent

    <!-- DataTables -->
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(function() {
            $('#driver').DataTable({
                'paging': false,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true
            })
            $('#van').DataTable({
                'paging': false,
                'lengthChange': true,
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