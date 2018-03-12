  @extends('layouts.driver')
  @section('title', 'Driver Report')
  @section('content-title', 'Driver Report')
  @section('content')
  <div class="row">
        <div class="col-md-3">
        <div class="box box-solid">
          <div class="box-header">
            <h3 class="box-title">Terminal</h3>
          </div>
          <div class=box-body>
            <ul class="nav nav-pills nav-justified">
            @foreach($terminals as $terminal)
              <li><a class href="#terminal{{$terminal->terminal_id}}" data-toggle="tab">{{$terminal->description}}</a></li>
            @endforeach
            </ul>
          </div>
        </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            @foreach($terminals as $terminal)
            <div id="terminal{{$terminal->terminal_id}}" class="tab-pane">
              <div class="box box-solid">
                <div class="box-header">
                  <h3 class="box-title">{{$terminal->description}}</h3>
                </div>
                <div class="box-body">
                    @foreach($destinations as $destination)
                        @if($destination->term_id == $terminal->terminal_id)
                        <div class="form-group">
                            <div class="input-group">
                                <label for="">{{$destination->description}}</label>
                                <input class='form-control pull-right' onblur='findTotal()' type='number' name='qty' id='qty{{$destination->term_id}}' style='width:20%'>
                                
                            </div>
                        </div>
                        @endif
                    @endforeach
                    <div class="form-group">
                        <label for="birthdateO">Date of Departure:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input value="" id="" name="" type="text" class="form-control pull-right datepicker">
                         </div>
                    </div>
                    <div class="form-group">
                        <label for="birthdateO">Time of Departure:</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input value="" id="" name="" type="text" class="form-control pull-right datepicker">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="box-header">
                            <h4>Destination</h4>
                        </div>
                        <div class="box-body" id="routeDestination">
                        </div>
                    </div> 
                    <div class='form-group'>
                        <label for=''>Total Passengers: </label>
                        <input class='form-control pull-right' type='text' name='total' id='total' style='width:20%;'>
                    </div>
                    <div class='form-group'>
                        <label for=''>Total Booking Fee: </label>
                        <input class='form-control pull-right' type='text' name='total' id='total' style='width:20%;'>
                    </div>
                    <div class="box-footer text-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmSubmission">Submit</button>
                    </div> 
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>                
        <!--        ARE YOU SURE MODAL-->
        <div class="modal fade" id="confirmSubmission">
            <div class="modal-dialog" style="margin-top:150px;">
                <div class="col-md-offset-2 col-md-8">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"> Are you sure you want to submit this report?</h4>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#successfulSubmission" data-dismiss="modal" style="width:22%;">Yes</button>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
</form>

        <!--               SUCCESS MODAL-->
        <div class="modal fade" id="successfulSubmission">
            <div class="modal-dialog" style="margin-top:150px;">
                <div class="col-md-offset-2 col-md-8">
                    <div class="modal-content">
                        <div class="modal-header bg-green">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" ><i class="fa fa-check-circle" style="font-size: 80px;"></i></h4>
                        </div>
                        <div class="modal-body text-center">
                            <p> Your Report has successfully been submitted</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-group-justified">Home</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
@endsection
@section('scripts') @parent


<!--   For sum of tables-->
<script type="text/javascript">
    function findTotal() {
        var arr = document.getElementsByName('qty');
        var tot = 0;
        for (var i = 0; i < arr.length; i++) {
            if (parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        document.getElementById('total').value = tot;
    }
</script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $('#selectTerminal').on('change', function(){
        var id = $('#selectTerminal').val();
        $.ajax({
          type: "POST",
          url : "{{route('drivermodule.showDestination')}}",
          data: {
            '_token': $('input[name=_token]').val(),
            'id': id,
          },
          success: function(data){
            var $op = $('#selectDestination');
            $op.empty();
            $.each(data, function(key,value){
                $op.append($('<option>').attr('value', value.destination_id).text(value.description));
            });    
          //   for(i = 0; i < data.length; i++){
          //     $('#selectDestination').append($('<option>', {
          //       value: data[i].destination_id,
          //       text: data[i].description
          //     }));
          //     $('#routeDestination').append("<div class='form-group destinations'><label for="+data[i].description+">"+data[i].description+"</label><input class='form-control pull-right' onblur='findTotal()' type='number' name='qty' id='qty"+i+"' style='width:20%'>");
          //     // $('#routeDestination').append($('<div>', {
          //     //   class: 'form-group destinations'
          //     // }).append($('<label>'),{
          //     //   for: data[i].description,
          //     //   text: data[i].description
          //     // }).append($('<input>'),{
          //     //   class: 'form-control pull-right',
          //     //   onblur: 'findTotal()',
          //     //   type: 'number',
          //     //   name:'qty',   
          //     //   id:'qty'+i,
          //     //   style:'width:20%'
          //     // }));
          //   }
          //   $('div.destinations:last-of-type').after("<div class='form-group'><label for=''>Total Passengers: </label><input class='form-control pull-right' type='text' name='total' id='total' style='width:20%;'></div><div class='form-group'><label for=''>Total Booking Fee: </label><input class='form-control pull-right' type='text' name='total' id='total' style='width:20%;'></div>");
          // }
            }
        });
    });
    </script> -->


    <script>
        $(cloneDatePicker());

        function cloneDatePicker() {

            //Date picker
            $('.datepicker').datepicker({
                autoclose: true
            })

        }

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
