@extends('layouts.master')
@section('title', 'Daily Ledger')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
  @stop
@section('content')

          <div id="ledgerInfo" class="box">
                    <!-- /.box-header -->
                    <name id="ledgerDate" style="font-size: 13pt">March 23, 2018</name>
                    <a href="./pages/addDaily.html" class="btn btn-primary btn-md" data-target="#addExpRev">
                Add <span class="glyphicon glyphicon-plus-sign"></span> 
            </a>

                    <div class="box-body">
                        <table id="dailyLedgerTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Payee/Payor</th>
                                    <th>Particulars</th>
                                    <th>OR#</th>
                                    <th>IN</th>
                                    <th>OUT</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Chabal loves shaina</td>
                                    <td>Booking Fee</td>
                                    <td>039501</td>
                                    <td>500</td>
                                    <td></td>
                                    <td>500</td>
                                    <td class="center-block">
                                        <div class="center-block">
                                            <a href="./pages/editDaily.html" class="btn btn-info">   <i class="glyphicon glyphicon-pencil">Edit</i>  </a>
                                            <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                        </div>
                                    </td>

                      
                                </tr>

                            </tbody>
                        </table>

                        <button type="button" class="btn btn-primary">Update Report</button>
                        <button type="button" class="btn btn-outline-danger">Delete Report</button>

                    </div>
                    <!-- /.box-body -->
                </div>
          
         

@stop

@section('scripts')
@parent
<script>
        $(function() {
            $('#example2').DataTable()
            $('#dailyLedgerTable').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': false,
                'ordering': true,
                'info': false,
                'autoWidth': true
            })
        })
    </script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                'placeholder': 'mm/dd/yyyy'
            })
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                format: 'MM/DD/YYYY h:mm A'
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function(start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })
        })
    </script>
@stop