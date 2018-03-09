  @extends('layouts.driver') @section('title', 'Driver Report') @section('content-title', 'Driver Report') @section('content')
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h4>Details</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Origin</label>

                                <select name="" id="" class="form-control">
                                    <option value="">scout barrio</option>
                                        <option value="">asd</option>
                                </select>
                            </div>

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
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="box">
                        <div class="box-header">
                            <h4>Destination</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">

                                <label for="">Pangasinan : </label>
                                <input class="form-control pull-right" onblur="findTotal()" type="text" name="qty" id="qty1" style="width:20%;">
                            </div>
                            <div class="form-group">

                                <label for="">La Union : </label>
                                <input class="form-control pull-right" onblur="findTotal()" type="text" name="qty" id="qty2" style="width:20%;">
                            </div>
                            <div class="form-group">

                                <label for="">Baguio : </label>
                                <input class="form-control pull-right" onblur="findTotal()" type="text" name="qty" id="qty3" style="width:20%;">
                            </div>
                            <div class="form-group">

                                <label for="">Nueva Ecija : </label>
                                <input class="form-control pull-right" onblur="findTotal()" type="text" name="qty" id="qty4" style="width:20%;">
                            </div>
                            <div class="form-group">

                                <label for="">Total Passengers: </label>
                                <input class="form-control pull-right" type="text" name="total" id="total" style="width:20%;">
                            </div>

                            <div class="form-group">

                                <label for="">Total Booking Fee: </label>
                                <input class="form-control pull-right" type="text" name="total" id="total" style="width:20%;">
                            </div>
                        </div>

                        <div class="box-footer text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmSubmission">Submit</button>
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