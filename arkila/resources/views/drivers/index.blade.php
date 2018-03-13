@extends('layouts.master') @section('title', 'List of Drivers') @section('content-header', 'List of Drivers') @section('content') @if(session()->get('opLink')) {{ session()->forget('opLink') }} @endif
<div class="box">
    <div class="box-body">
        <div class="col-md-6">
            <a href="{{route('drivers.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Create New</a>
        </div>
        <table id="driverList" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Driver ID</th>
                    <th>Operator</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach($drivers->where('status','Active') as $driver)
                <tr>
                    <th>{{$driver->member_id}}</th>
                    <td>{{$driver->operator->full_name ?? null}}</td>
                    <td>{{$driver->full_name}}</td>
                    <td>{{$driver->contact_number}}</td>
                    <td>{{$driver->address}}</td>
                    <td>{{$driver->age}}</td>
                    <td>
                        <div class="text-center">
                            <a href="{{route('drivers.edit',[$driver->member_id])}}" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i>Edit</a>
                            <a href="{{route('drivers.show',[$driver->member_id])}}" class="btn btn-default"><i class="fa fa-eye"></i>View</a>

                            <button type="button" data-toggle="modal" data-target="#{{'deleteWarning'.$driver->member_id}}" class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>

                        </div>
                        <!-- /.text-->
                    </td>
                    <!-- Modal for Delete-->
                    <div class="modal fade" id="{{'deleteWarning'.$driver->member_id}}">
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
                                            <p style="font-size: 110%;">Are you sure you want to delete "{{ $driver->full_name }}"</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('drivers.archiveDelete', $driver->member_id)}}" method="POST">
                                            {{csrf_field()}} {{method_field('PATCH')}}

                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                            <button type="submit" name="driverArc" value="Arch " class="btn btn-danger" style="width:22%;">Delete</button>
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

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box-->

<button type="submit" class="btn btn-default pull-right" style="width:22%;">Print List</button>



@stop @section('scripts') @parent

<script>
    $(function() {
        $('#driverList').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        });

    })
</script>

@stop