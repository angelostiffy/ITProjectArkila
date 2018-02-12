@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">My Drivers</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <a href="/home/drivers/create" class="btn btn-sm btn-primary btn-create">Create New</a>
                  </div>
                </div>
              </div>
              <div class="panel-body">

                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>

                        <!-- <th><em class="fa fa-cog"></em></th> -->
                        <th class="hidden-xs">ID</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Age</th>
                        <th>Operator</th>
                        <th>Actions</th>

                    </tr> 
                  </thead>
                  <tbody>
                  @foreach ($drivers as $driver)
                          <tr>
                            <td class="hidden-xs">{{ $driver->driver_id }}</td>
                            <td>{{ $driver->first_name }} {{ $driver->middle_name }} {{ $driver->last_name }}</td>
                            <td>{{ $driver->contact_number}} </td>
                            <td>{{ $driver->address }} </td>
                            <td>{{ $driver->age }} </td>
                            <td>{{ $driver->operator->first_name . " " . $driver->operator->last_name }} </td>
                            <td> <a href="drivers/{{ $driver->driver_id }}">View Details</a>
                            <form action="{{ route('drivers.destroy', [$driver->driver_id]) }}" method="POST">
                                 {{ csrf_field() }}
                                 <input type="hidden" name="_method" value="DELETE">
                                 <button>Delete</button> 
                                </form>
                            </td>
                          </tr>
                  @endforeach

                        </tbody>
                </table>
              </div>
              </div>
            </div>
            <a href="/drivers">Back</a>

</div>
@endsection