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

                            <form action="{{ route('operators.destroy', [$operator->member_id]) }}" method="POST">
                                {{ csrf_field() }} {{method_field('DELETE')}}
                                <a href="{{ route('operators.showProfile', [$operator->member_id]) }}" class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</i></button>
                            </form>
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
            'autoWidth': true,
            "order": [[ 1, "desc" ]]
        })
    })
</script>

@stop