@extends('vans.master')
@section('table')
    <section class="content">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
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
                  <td>0998273/td>
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
                <tr>
                  <th>215231</th>
                  <td>pug</td>
                  <td>miguel</td>
                  <td>3254353</td>
                  <td>basura</td>
                  <td>23</td>
                  <td>
                    <div class="text-center">
                        <button class="btn btn-primary "><i class="fa fa-eye"></i> View</button>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</i></button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>2151342</th>
                  <td>dixon</td>
                  <td>23542456</td>
                  <td>pug</td>
                  <td>sa tabi</td>
                  <td>26</td>
                  <td>
                    <div class="text-center">
                        <button class="btn btn-primary "><i class="fa fa-eye"></i> View</button>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</i></button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>fe23423</th>
                  <td>sir bench</td>
                  <td>0982163711212314</td>
                  <td>silang</td>
                  <td>pug</td>
                  <td>60</td>
                  <td>
                    <div class="text-center">
                        <button class="btn btn-primary "><i class="fa fa-eye"></i> View</button>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</i></button>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection