@extends('layouts.master') 
@section('title', 'Manage Tickets') 
@section('content-header', 'Manage Tickets')
@section('content')
<div class="row">
                    <div class="col-md-9">
                           <!-- Custom Tabs -->
                        <div class="nav-tabs-custom ">
                            <ul class="nav nav-tabs ">
                          <li class="tab-menu active" id="onboardTicketTab-menu"><a href="#onboardTicketTab" data-toggle="tab">On Board</a></li>
                          <li class="tab-menu" id="soldTicketTab-menu"><a href="#soldTicketTab" data-toggle="tab">Sold Tickets</a></li>
                          <li class="tab-menu" id="lineReservationTab-menu"><a href="#lineReservationTab" data-toggle="tab">Line Reservations</a></li>
                            </ul>
                            <div class="tab-content">
                            
                                <!-- On Board Tickets Tab -->
                                <div class="tab-pane active" id="onboardTicketTab">
                            
                                    <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa  fa-undo"></i></button>
                                    </div>
                                  <table id="onboardTickets" class="table table-bordered sold-tickets">
                                    <thead>
                                    <tr>
                                      <th>Ticket No.</th>
                                      <th>Destination</th>
                                      <th>Date Purchased</th>
                                      <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      <td><input type="checkbox"> C-1</td>
                                      <td>Cabanatuan</td>
                                      <td></td>
                                      <td>
                                        <button class="btn btn-outline-danger"><i class="fa fa-undo"></i> Remove</button>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td><input type="checkbox"> C-1</td>
                                      <td>Pozorrubio</td>
                                      <td></td>
                                      <td>
                                        <button class="btn btn-outline-danger"><i class="fa fa-undo"></i> Remove</button>
                                    </tr>
                                    <tr>
                                      <td><input type="checkbox"> C-20</td>
                                      <td>Cabanatuan</td>
                                      <td></td>
                                      <td>
                                        <button class="btn btn-outline-danger"><i class="fa fa-undo"></i> Remove</button>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td><input type="checkbox"> SJ-1</td>
                                      <td>San Jose</td>
                                      <td></td>
                                      <td>
                                        <button class="btn btn-outline-danger"><i class="fa fa-undo"></i> Remove</button>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td><input type="checkbox"> SJ-3</td>
                                      <td>San Jose</td>
                                      <td></td>
                                      <td>
                                        <button class="btn btn-outline-danger"><i class="fa fa-undo"></i> Remove</button>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td><input type="checkbox"> SJ-4</td>
                                      <td>San Jose</td>
                                      <td></td>
                                      <td>
                                        <button class="btn btn-outline-danger"><i class="fa fa-undo"></i> Remove</button>
                                      </td>
                                    </tr>
                                    </tbody>
                                  </table>
                                </div>

                                <!-- Sold Ticket Tab -->
                                <div class="tab-pane" id="soldTicketTab">
                                    <div class="pull-left col-md-6">
                                        <button type="button" class="btn btn-info btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-automobile"></i> Board</button>
                                            <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    <table id="soldTickets" class="table table-bordered sold-tickets">
                                        <thead>
                                            <tr>
                                              <th>Ticket No.</th>
                                              <th>Destination</th>
                                              <th>Date Purchased</th>
                                              <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                              <td><input type="checkbox"> C-1</td>
                                              <td>Cabanatuan</td>
                                              <td></td>
                                              <td>
                                                <button class="btn btn-primary"><i class="fa fa-money"></i> Refund</button>
                                                <button class="btn btn-info"><i class="fa fa-edit"></i> Change Destination</button>
                                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td><input type="checkbox"> C-1</td>
                                              <td>Pozorrubio</td>
                                              <td></td>
                                              <td>
                                                <button class="btn btn-primary"><i class="fa fa-money"></i> Refund</button>
                                                <button class="btn btn-info"><i class="fa fa-edit"></i> Change Destination</button>
                                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td><input type="checkbox"> C-20</td>
                                              <td>Cabanatuan</td>
                                              <td></td>
                                              <td>
                                                <button class="btn btn-primary"><i class="fa fa-money"></i> Refund</button>
                                                <button class="btn btn-info"><i class="fa fa-edit"></i> Change Destination</button>
                                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td><input type="checkbox"> SJ-1</td>
                                              <td>San Jose</td>
                                              <td></td>
                                              <td>
                                                <button class="btn btn-primary"><i class="fa fa-money"></i> Refund</button>
                                                <button class="btn btn-info"><i class="fa fa-edit"></i> Change Destination</button>
                                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td><input type="checkbox"> SJ-3</td>
                                              <td>San Jose</td>
                                              <td></td>
                                              <td>
                                                <button class="btn btn-primary"><i class="fa fa-money"></i> Refund</button>
                                                <button class="btn btn-info"><i class="fa fa-edit"></i> Change Destination</button>
                                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button></td>
                                            </tr>
                                            <tr>
                                              <td><input type="checkbox"> SJ-4</td>
                                              <td>San Jose</td>
                                              <td></td>
                                              <td>
                                                <button class="btn btn-primary"><i class="fa fa-money"></i> Refund</button>
                                                <button class="btn btn-info"><i class="fa fa-edit"></i> Change Destination</button>
                                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                              
                                <!-- Line Reservation Tab -->
                                <div class="tab-pane" id="lineReservationTab">
                                    <table id="lineReservations" class="table table-bordered">
                                        <thead>
                                            <tr>
                                              <th>Reservation ID</th>
                                              <th>Name</th>
                                              <th>Contact No.</th>
                                              <th>Expire Date</th>
                                              <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                              <td>C-2</td>
                                              <td>John Doe</td>
                                              <td>09xxxxxxx</td>
                                              <td></td>
                                              <td>
                                              <button class="btn btn-primary"><i class="fa fa-ticket"></i> Sell Ticket</button>
                                              <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>C-11</td>
                                              <td>sasdasdw</td>
                                              <td>09xxxxxxx</td>
                                              <td></td>
                                              <td>
                                              <button class="btn btn-primary"><i class="fa fa-ticket"></i> Sell Ticket</button>
                                              <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>C-20</td>
                                              <td>Jan Doe</td>
                                              <td>09xxxxxxx</td>
                                              <td></td>
                                              <td>
                                              <button class="btn btn-primary"><i class="fa fa-ticket"></i> Sell Ticket</button>
                                              <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>SJ-1</td>
                                              <td>Jose</td>
                                              <td>09xxxxxxx</td>
                                              <td></td>
                                              <td>
                                              <button class="btn btn-primary"><i class="fa fa-ticket"></i> Sell Ticket</button>
                                              <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>SJ-3</td>
                                              <td>San Doe</td>
                                              <td></td>
                                              <td></td>
                                              <td>
                                              <button class="btn btn-primary"><i class="fa fa-ticket"></i> Sell Ticket</button>
                                              <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>SJ-4</td>
                                              <td>John Tho</td>
                                              <td>09xxxxxxx</td>
                                              <td></td>
                                              <td>
                                              <button class="btn btn-primary"><i class="fa fa-ticket"></i> Sell Ticket</button>
                                              <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
@section('scripts')
    @parent
        <script>
            $(function () {
                //Enable iCheck plugin for checkboxes
                //iCheck for checkbox and radio inputs
                $('.sold-tickets input[type="checkbox"]').iCheck({
                  checkboxClass: 'icheckbox_flat-blue'
                });

                //Enable check and uncheck all functionality
                $(".checkbox-toggle").click(function () {
                  var clicks = $(this).data('clicks');
                  if (clicks) {
                    //Uncheck all checkboxes
                    $(".sold-tickets input[type='checkbox']").iCheck("uncheck");
                    $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
                  } else {
                    //Check all checkboxes
                    $(".sold-tickets input[type='checkbox']").iCheck("check");
                    $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
                  }
                  $(this).data("clicks", !clicks);
                });
            });
        </script>
@endsection