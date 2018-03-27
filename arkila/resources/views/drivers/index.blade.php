@extends('layouts.master') @section('title', 'List of Drivers') @section('content-header', 'List of Drivers') @section('content') @if(session()->get('opLink')) {{ session()->forget('opLink') }} @endif
<div class="box">
    <div class="box-body" style="box-shadow: 0px 5px 10px gray;">
        <div class="col-md-6">
            <a href="{{route('drivers.create')}}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Create New</a>
            <a href=""  class="btn btn-default"> <i class="fa fa-print"></i> Print</a>
        </div>
        <table id="driverList" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Driver ID</th>
                    <th>Operator</th>
                    <th>Name</th>
                    <th>Contact Number</th>
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
                    <td>
                        <div class="text-center">
                            <a href="{{route('drivers.show',[$driver->member_id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> VIEW</a>
                            <a href="{{route('drivers.edit',[$driver->member_id])}}" class="btn btn-outline-secondary btn-sm"><i class="fa fa-pencil-square-o"></i> EDIT</a> 
                            <button type="button" data-toggle="modal" data-target="#{{'deleteWarning'.$driver->member_id}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> DELETE</button>
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
                                            <h1><i class="fa fa-exclamation-triangle pull-left text-yellow">  </i></h1>
                                            <p>Are you sure you want to delete "{{ $driver->full_name }}"?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('drivers.archiveDelete', $driver->member_id)}}" method="POST">
                                            {{csrf_field()}} {{method_field('PATCH')}}

                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                            <button type="submit" name="driverArc" value="Arch " class="btn btn-danger">Delete</button>
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

@stop 
@section('scripts') 
@parent

<script>
    $(function() {
        $('#driverList').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            'order': [[ 0, "desc" ]],
            'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [-1] /* 1st one, start by the right */
            }]
        });

    })
</script>

@stop