@extends('layouts.master')
@section('title', 'Settings')
@section('content')

<row>
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Settings</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> <input type="checkbox" checked data-toggle="toggle">
                  <span class="label label-primary pull-right">12</span></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                </li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-9">
          <row>
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#terminalTab" data-toggle="tab">Terminals</a></li>
                <li><a href="#destinationTab" data-toggle="tab">Destinations</a></li>
                <li><a href="#feeTab" data-toggle="tab">Fees</a></li>
                <li><a href="#discountTab" data-toggle="tab">Discounts</a></li>
              </ul>
              <div class="tab-content">
                <!-- Terminal Tab -->
              <div class="tab-pane active" id="terminalTab">
                <div>
                   <a href="addTerminal.html" class="btn btn-success"><i class="fa fa-plus"> </i> Add Terminal </a>
                </div>
                  <table id="terminals" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Terminal Name</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>Cabanatuan City</td>
                      <td>
                        <div class="form-group">
                          <a href="editTerminal.html" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
                          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-terminal"><i class="fa fa-trash"></i>Delete</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                        <td>San Jose City</td>
                        <td></td>
                    </tr>
                    </tbody>
                  </table>
          </div>
        <!-- Destinations Tab -->
              <div class="tab-pane" id="destinationTab">
                <div>
                   <a href="addDestination.html" class="btn btn-success"><i class="fa fa-plus"> </i> Add Destination </a>
                </div>
                  <table id="destinations" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Fare</th>
                      <th>Terminal</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>
                        <div class= "icheckbox_flat-blue">
                          <input type="checkbox">
                        </div>
                      </td>
                      <td>Cabanatuan</td>
                      <td>240.00</td>
                      <td></td>
                      <td>
                        <div class="form-group">
                          <a href="editDestination.html" class="btn btn-info"><i class="fa fa-edit" ></i>Edit</a>
                          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-destination"><i class="fa fa-trash"></i>Delete</button>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                      </td>
                        <td>San Jose</td>
                        <td>240.00</td>
                        <td>San Jose</td>
                        <td></td>
                    </tr>
                    </tbody>
                  </table>
          </div>
          <!-- Fee Tab -->
                <div class="tab-pane" id="feeTab">
                  <div>
                   <a href="addFee.html" class="btn btn-success"><i class="fa fa-plus"> </i> Add Fee </a>
                  </div>
                    <table id="fees" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Fee</th>
                        <th>Amount</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>Booking Fee (Baguio)</td>
                        <td>20.00</td>
                        <td>
                        <a href="editFee.html" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-fee"><i class="fa fa-trash"></i> Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <td>SOP</td>
                        <td>100.00</td>
                        <td>
                        <button class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                </div>
          <!-- Discount Tab -->
            <div class="tab-pane" id="discountTab">
              <div>
                   <a href="addDiscount.html" class="btn btn-success"><i class="fa fa-plus"> </i> Add Discount </a>
                </div>
                    <table id="discounts" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Discount</th>
                        <th>Amount</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>Senior Citizen</td>
                        <td>20.00</td>
                        <td>
                        <a href="editDiscount.html" class="btn btn-info" ><i class="fa fa-edit"></i> Edit</a>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-discount"><i class="fa fa-trash"></i> Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <td>PWD</td>
                        <td>20.00</td>
                        <td>
                        <button class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                        <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                </div>

            </div>
          </div>
        <!-- /.col -->
      </div>
      </row>

@endsection

@section('scripts')
@parent

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script>
  $(function () {
    $('#terminals').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    })
    $('#destinations').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    })
    $('#fees').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
    })
    $('#discounts').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection
