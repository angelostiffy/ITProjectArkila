@extends('layouts.master') 
@section('title', 'index') 
@section('content-header', 'Van List')

@section('content')
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
        <table id="van" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Driver ID</th>
                    <th>Operator ID</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>pug</th>
                    <td>pug</td>
                    <td>Chabal loves shaina</td>
                    <td>0998273</td>
                    <td>badihoy</td>
                    <td>15</td>
                    <td>
                        <div class="text-center">
                            <a href="viewVan.html" class="btn btn-primary"><i class="fa fa-eye"></i>View</a>
                            <a href="editVan.html" class="btn btn-info"><i class="fa fa-pencil-square-o"></i>Edit</a>
                            <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</i></button>
                        </div>
                    </td>
                </tr>
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
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
        })
    })
</script>

@stop