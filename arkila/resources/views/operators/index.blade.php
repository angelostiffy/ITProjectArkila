@extends('layouts.master') @section('title', 'List of Operators') @section('content-header', 'List of Operators')@section('content')
<div class="box">
    <div class="box-body" style="box-shadow: 0px 5px 10px gray;">
        <div class="col col-md-6">
            <a href="/home/operators/create" class="btn btn-primary btn-create"><i class="fa fa-plus-circle"></i> Create New</a>
            <a href=""  class="btn btn-default"> <i class="fa fa-print"></i> Print</a>
        </div>
        <!-- /.col -->
        <table id="operatorList" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($operators as $operator)
                <tr>
                    <td class="hidden-xs" name="opId">{{ $operator->member_id }}</td>
                    <td><a href="operators/{{ $operator->member_id }}">{{ $operator->first_name }} {{ $operator->middle_name }} {{ $operator->last_name }}</a></td>
                    <td>{{ $operator->contact_number }}</td>
                    <td>{{ $operator->address }}</td>
                    <td>{{ $operator->age }}</td>
                    <td>
                        <div class="text-center">
                            <a href="{{ route('operators.showProfile', [$operator->member_id]) }}" class="btn btn-default"><i class="fa fa-eye"></i> View</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ 'deleteWarning'.$operator->member_id }}"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                        <!-- /.text -->
                    </td>
                </tr>
                <!-- Modal for Delete-->
                <div class="modal fade" id="{{ 'deleteWarning'.$operator->member_id }}">
                    <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header bg-red">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                    <h4 class="modal-title"> Confirm</h4>
                                </div>
                                <div class="modal-body">
                                        <h1>
                                        <i class="fa fa-exclamation-triangle pull-left text-yellow" ></i>
                                        </h1>
                                        <p>Are you sure you want to delete "{{ $operator->full_name }}"</p>
                                </div>
                                <div class="modal-footer">
                                    @if($operators && $operator)
                                    <form action="{{ route('operators.destroy', [$operator->member_id]) }}" method="POST">
                                        {{ csrf_field() }} {{method_field('DELETE')}}
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
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection
@section('scripts') 
@parent

<!-- DataTables -->
<script src="{{ URL::asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
    $(function() {
        $('#operatorList').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            "order": [[ 1, "desc" ]]
        })
    })
</script>

@endsection