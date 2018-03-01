@extends('layouts.master') @section('title', 'Settings') @section('content')

<row>
    <div class="col-md-4">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Advanced Features</h3>
                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li>
                        <a href="#">
                            <i class="fa fa-inbox"></i> Online Reservation Feature
                            <span class="label pull-right">         
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </span>
                        </a>
                    </li>
                    <li><a href="#">
                            <i class="fa fa-inbox"></i> Walk-in Reservation Feature
                            <span class="label pull-right">         
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-inbox"></i> Van Rental Feature
                            <span class="label pull-right">         
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </span>
                        </a>
                    </li>
                    <li><a href="#">
                            <i class="fa fa-inbox"></i> Driver Module
                            <span class="label pull-right">         
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </span>
                        </a>
                    </li>
                    <li><a href="#">
                            <i class="fa fa-inbox"></i> Customer Module
                            <span class="label pull-right">         
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-8">
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
                        <div class="col-md-6 pull-left">
                            <a href="/home/settings/terminal/create" class="btn btn-success"><i class="fa fa-plus-circle"> </i> Add Terminal </a>
                        </div>
                        <table id="terminals" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Terminal Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($terminals as $terminal)
                                <tr>
                                    <td>{{$terminal->description}}</td>
                                    <td>
                                        <div class="form-group">
                                            <a href="{{ route('terminal.edit', [$terminal->terminal_id]) }}" class="btn btn-info"><i class="fa fa-edit"></i>Edit</a>
                                            <form action="{{ route('terminal.destroy',[$terminal->terminal_id]) }}" method="POST">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-terminal"><i class="fa fa-trash"></i>Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Destinations Tab -->
                    <div class="tab-pane" id="destinationTab">
                        <div class="col-md-6 pull-left">
                            <a href="/home/settings/destinations/create" class="btn btn-success"><i class="fa fa-plus-circle"> </i> Add Destination </a>
                        </div>
                        <table id="destinations" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Fare</th>
                                    <th>Terminal</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($destinations as $destination)
                                <tr>
                                    <td>{{$destination->description}}</td>
                                    <td>{{$destination->amount}}</td>
                                    <td>{{$destination->terminal}}</td>
                                    <td>
                                        <div class="form-group">
                                            <a href="{{ route('destinations.edit', [$destination->destination_id]) }}" class="btn btn-info"><i class="fa fa-edit" ></i>Edit</a>
                                            <form action="{{ route('destinations.destroy', [$destination->destination_id]) }}" method="POST">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-destination"><i class="fa fa-trash"></i>Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- Fee Tab -->
                    <div class="tab-pane" id="feeTab">
                        <div class="col-md-6 pull-left">
                            <a href="/home/settings/fees/create" class="btn btn-success"><i class="fa fa-plus-circle"> </i> Add Fee </a>
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
                                @foreach($fees as $fee)
                                <tr>
                                    <td>{{$fee->description}}</td>
                                    <td>{{$fee->amount}}</td>
                                    <td>
                                        <a href="{{ route('fees.edit', [$fee->fad_id]) }}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="{{ route('fees.destroy', [$fee->fad_id]) }}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Discount Tab -->
                    <div class="tab-pane" id="discountTab">
                        <div class="col-md-6 pull-left">
                            <a href="/home/settings/discounts/create" class="btn btn-success"><i class="fa fa-plus-circle"> </i> Add Discount </a>
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
                                @foreach($discounts as $discount)
                                <tr>
                                    <td>{{$discount->description}}</td>
                                    <td>{{$discount->amount}}</td>
                                    <td>
                                        <a href="{{ route('discounts.edit', [$discount->fad_id]) }}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</a>
                                        <form action="{{ route('discounts.destroy', [$discount->fad_id]) }}" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-discount"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.col -->
    </div>
    </row>

    @endsection @section('scripts') @parent

    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree()
        })

    </script>
    <script>
        $(function() {
            $('#terminals').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
            })
            $('#destinations').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
            })
            $('#fees').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true,
            })
            $('#discounts').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true
            })
        })

    </script>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 40px;
            height: 20px;
        }

        /* Hide default HTML checkbox */

        .switch input {
            display: none;
        }

        /* The slider */

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: gray;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 15px;
            width: 18px;
            left: 5px;
            bottom: 3px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #0275d8;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(13px);
            -ms-transform: translateX(13px);
            transform: translateX(13px);
        }

        /* Rounded sliders */

        .slider.round {
            border-radius: 100px;
        }

        .slider.round:before {
            border-radius: 80%;
        }

    </style>
    @endsection
