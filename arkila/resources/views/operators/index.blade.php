@extends('layouts.master') @section('title', 'List of Operators') @section('content-header', 'List of Operators')@section('content')
<div class="box">
    <div class="box-body">
        <div class="col col-md-6">
            <a href="/home/operators/create" class="btn btn-primary btn-create"><i class="fa fa-plus-circle"></i> Create New</a>
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
                            <a href="{{ route('operators.showProfile', [$operator->member_id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteWarning"><i class="fa fa-trash"></i> Delete</button>
                        </div>
                        <!-- /.text -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->


<!-- Modal for Delete-->
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
                        <p style="font-size: 110%;">Are you sure you want to delete "yung user"</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('operators.destroy', [$operator->member_id]) }}" method="POST">
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
@stop @section('scripts') @parent

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
            'autoWidth': true
        })
    })
</script>

@stop