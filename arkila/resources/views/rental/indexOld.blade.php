@extends('layouts.master')
@section('title', 'Rental List')
@section('content-header', 'Rental List')
@section('links')
@parent
<!-- DataTables -->
<link rel="stylesheet" href="{{ URL::asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
<!-- additional CSS -->
<link rel="stylesheet" href="tripModal.css"> 

@stop
@section('content')
<a href="/home/rental/create" class="btn btn-sm btn-primary btn-create">Create New</a>
<section class="content">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Destination</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Contact No.</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rentals->sortByDesc('created_at') as $rental)
                <tr>
                  <td>{{ $rental->full_name }}</td>
                  <td>{{ $rental->destination }}</td>
                  <td>{{ $rental->departure_date }}</td>
                  <td>{{ $rental->departure_time }}</td>
                  <td>{{ $rental->contact_number }}</td>
                  <td>{{ $rental->status }}</td>
                  <td>
                    <div class="text-center">
                      <form action="{{ route('rental.update', $rental->rent_id) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('PATCH') }}

                        @if ($rental->status == 'Pending')
                            <button class="btn btn-success" name="click" id="depart" onclick="return ConfirmStatus()" value="Departed"><i class="fa fa-automobile"></i> Depart</button>
                            <button class="btn btn-danger" name="click" id="decline" onclick="return ConfirmStatus()" value="Declined"><i class="fa fa-close"></i> Decline</button>
                            <button class="btn btn-info" name="click" id="cancel" onclick="return ConfirmStatus()" value="Cancelled"><i class="fa fa-edit"></i> Cancel</button>
                        @else
                            <form method="POST" action="/home/rental/{{ $rental->rent_id }}" class="delete">
                                 {{csrf_field()}}
                                 {{method_field('DELETE')}}
                              <button class="btn btn-danger" onclick="return ConfirmDelete()"><i class="fa fa-close"></i> Delete</i></button>
                            </form>


                        @endif
                      </form>
                    </div>
                  </td>
                </tr>
                @endforeach
                <!-- <tr>
                  <td>Randall Caballar</td>
                  <td>San Juan, La Union</td>
                  <td>03-20-2018</td>
                  <td>1:00 PM</td>
                  <td>09164562817</td>
                  <td>Approved</td>
                  <td>
                    <div class="text-center">
                        <button class="btn btn-success "><i class="fa fa-automobile"></i> Depart</button>
                        <button class="btn btn-danger"><i class="fa fa-close"></i> Decline</button>
                        <button class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>Dixon Viloria</td>
                  <td>Vigan, Ilocos Sur</td>
                  <td>03-02-2018</td>
                  <td>10:00 AM</td>
                  <td>09154567268</td>
                  <td>Pending</td>
                  <td>
                    <div class="text-center">
                        <button class="btn btn-success	 "><i class="fa fa-automobile"></i> Depart</button>
                        <button class="btn btn-danger"><i class="fa fa-close"></i> Decline</button>
                        <button class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                    </div>
                  </td>
                </tr> -->
                
         
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>

@endsection
@section('scripts')
@parent

    <!-- DataTables -->
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') }}")></script>
    <script src="{{ URL::asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
            
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

  function ConfirmDelete()
    {
        var x = confirm("Delete this rental request?");
        if (x)
        return true;
        else
        return false;
    }

    function ConfirmStatus()
    {
       var x = confirm("Change status?");

        if (x)
        return true;
        else
        return false;

    }
</script>
@endsection