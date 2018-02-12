@extends('layouts.app')
@section('content')
<div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">My Operators</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <a href="/home/operators/create" class="btn btn-sm btn-primary btn-create">Create New</a>
                  </div>
                </div>
              </div>
              <div class="panel-body">

                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th class="hidden-xs">ID</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Age</th>
                        <th>Action</th>
                    </tr> 
                  </thead>
                  <tbody>
                  @foreach ($operators as $operator)
                          <tr>
                            <td class="hidden-xs">{{ $operator->operator_id }}</td>
                            <td><a href="operators/{{ $operator->operator_id }}">{{ $operator->first_name }} {{ $operator->middle_name }} {{ $operator->last_name }}</a></td>
                            <td>{{ $operator->contact_number }}</td>
                            <td>{{ $operator->address }}</td>
                            <td>{{ $operator->age }}</td>
                            <td><a href="operators/{{ $operator->operator_id }}">View Details</a>
                                <form action="{{ route('operators.destroy', [$operator->operator_id]) }}" method="POST">
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