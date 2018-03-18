 @extends('layouts.driver')
 @section('title', 'Driver Report')
 @section('content-title', 'Driver Report')
 @section('content')
<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <div class="nav-tabs-custom">
            @include('message.error')
            @include('message.success')
            <ul class="nav nav-tabs nav-justified">@foreach($terminals as $terminal)
                <li @if($terminals->first() == $terminal) class='active' @endif><a class href="#terminal{{$terminal->terminal_id}}" data-toggle="tab">{{$terminal->description}}</a></li>
                @endforeach
            </ul>



            <div class="tab-content">
                @foreach($terminals as $terminal)
                <div id="terminal{{$terminal->terminal_id}}" class="tab-pane @if($terminals->first() == $terminal) {{'active'}} @endif" >

                    <div class="box box-solid">
                        <div class="box-header">
                            <h3 class="box-title">{{$terminal->description}}</h3>
                        </div>

                            <div class="box-body">
                                <form action="{{route('drivermodule.storeReport')}}" id="terminal{{$terminal->terminal_id}}" method="POST" class="form-horizontal">
                                <div class="col-md-6">
                                  <input type="hidden" name="termId" value="{{$terminal->terminal_id}}">

                                        {{csrf_field()}}
                                        @foreach($destinations as $destination)

                                            @if($destination->term_id == $terminal->terminal_id)
                                            <input type="hidden" name="terminalId" class="dest" >
                                        <div class='form-group'>
                                            <label for="" class="col-sm-4">{{$destination->description}}</label>
                                            <div class="col-sm-6">
                                            <input class='form-control pull-right' onblur='findTotal()' type='number' name='qty[]' id='qty{{$destination->term_id}}' >
                                            </div>
                                            <input type="hidden" name='destination[]' value='{{$destination->destid}}'>
                                        </div>

                                            @endif

                                        @endforeach

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="departureDate"  class="col-sm-4">Date of Departure:</label>
                                        <div class="input-group date col-sm-8">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input value="" id="" name="dateDeparted" type="text" class="form-control pull-right datepicker">
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class = "bootstrap-timepicker">
                                        <label for="timeDepart" class="col-sm-4">Time of Departure:</label>
                                        <div class="input-group col-sm-8">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input id="timepicker" name="timeDeparted" class = "form-control">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <label for="" class="col-md-2"></label>
                                        <div class="col-md-5">
                                            <div class='form-group'>
                                                <label for=''>Total Passengers: </label>
                                                <input class='form-control col-xs-3' type='text' name='totalPassengers' id='totalPassengers'>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class='form-group clearfix'>
                                                <label for=''>Total Booking Fee: </label>
                                                <input class='form-control col-xs-3' type='text' data-bookingfee="{{$terminal->booking_fee}}" name='totalBookingFee' id='totalFee'>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Number of Customers with Discount</p>
                                    <div class="form-horizontal">
                                            @foreach($fads as $fad)
                                            <div class='form-group'>
                                                <label for='' class="col-sm-4"> {{$fad->description}} Discounts: </label>
                                                <div class="col-sm-8">
                                                <input type="hidden" name="discountId[]" value="{{$fad->fad_id}}">
                                                <input class='form-control col-sm-9' type='number' name='numberOfDiscount[]'>
                                                </div>
                                            </div>
                                            @endforeach
                                    </div>
                                    <div class="col-md-12">
                                        <div class="box-footer text-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#discountModal{{$terminal->terminal_id}}">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                                        </div>
                    </div>
                </div>


            <!-- /.tab-content -->
                        <!--               DISCOUNT MODAL-->
            <div class="modal fade" id="discountModal{{$terminal->terminal_id}}">
                <div class="modal-dialog" style="margin-top:150px;">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="modal-content">
                            <div class="modal-header bg-blue">
                                Confirm
                            </div>
                            <div class="modal-body text-center">
                                <p>Are you sure you want to add these tickets?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-default">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            </form>

            @endforeach
            <!-- /.modal -->
            </div>
        </div>
        <!-- /.nav-tabs -->
    </div>
    <!-- /.col -->
</div>

@endsection @section('scripts') @parent


<!--   For sum of tables-->
<script type="text/javascript">
    function findTotal() {
        var arr = document.getElementsByName('qty[]');
        var tot = 0;
        for (var i = 0; i < arr.length; i++) {
            if (parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }

        document.getElementById('totalPassengers').value = tot;
        var bookingFee = document.getElementById('totalFee');
        bookingFee.value = document.getElementById('totalPassengers').value * bookingFee.getAttribute('data-bookingfee');
    }

    //document.getElementById('dest').value = document.getElementById('termId').value;

</script>

<script>
    $('#timepicker').timepicker({
            showInputs: false,
            defaultTime: false
        })
</script>
<script>

    function cloneDatePicker() {

        //Date picker
        $('.datepicker').datepicker({
            autoclose: true
        })

    }
      $(function() {

        //Date picker
        cloneDatePicker();

    })



    function addItem() {
        var tablebody = document.getElementById('childrens');
        if (tablebody.rows.length == 1) {
            tablebody.rows[0].cells[tablebody.rows[0].cells.length - 1].children[0].children[0].style.display = "";
        }


        var tablebody = document.getElementById('childrens');
        var iClone = tablebody.children[0].cloneNode(true);
        for (var i = 0; i < iClone.cells.length; i++) {
            iClone.cells[i].children[0].value = "";
            iClone.cells[1].children[0].children[1].value = "";


        }
        tablebody.appendChild(iClone);
        cloneDatePicker();
    }


    function rmv() {
        var tabRow = document.getElementById("childrens");
        if (tabRow.rows.length == 1) {
            tabRow.rows[0].cells[tabRow.rows[0].cells.length - 1].children[0].children[0].style.display = "none";
        } else {
            tabRow.rows[0].cells[tabRow.rows[0].cells.length - 1].children[0].children[0].style.display = "";
        }
    }


</script>



@endsection
