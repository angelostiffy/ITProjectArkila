@extends('layouts.master') 
@section('title', 'Ticket Sale') 
@section('content-header', 'Ticket Sale') 
@section('links') 
    @parent 
<style>
        .list-arrows button{
            min-width: 95px;
            max-width: 95px;
        }

        .well{
            margin-bottom: 0px;
        }

        .ticket-box{
        }
            .dual-list .list-group {
            margin-top: 8px;
        }

        .list-left li, .list-right li {
            cursor: pointer;
        }

        .list-arrows {
            padding-top: 100px;
        }

            .list-arrows button {
                margin-bottom: 20px;
            }

        .with-shadow{
            box-shadow:0px 0px 15px 0px rgba(0, 0, 0, 0.96);
        }
        .scrollbar {
      padding:0px;
      height: 100%;
    float: left;
    width: 100%;
    background: #fff;
    overflow-y: scroll;
    margin-bottom: 15px;
}

.ticket-overflow {
    min-height: 320px;
    max-height: 320px;
}

.scrollbar-info::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #F5F5F5;
  border-radius: 10px; }

.scrollbar-info::-webkit-scrollbar {
  width: 12px;
  background-color: #F5F5F5; }

.scrollbar-info::-webkit-scrollbar-thumb {
  border-radius: 10px;
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
  background-color: #33b5e5; }

  .square::-webkit-scrollbar-track {
  border-radius: 0 !important; }

.square::-webkit-scrollbar-thumb {
  border-radius: 0 !important; }

.thin::-webkit-scrollbar {
  width: 6px; }

.list-group-style {
  margin-bottom: 0px;
}

.list-group-item:first-child {
  border-top-left-radius: 0px ;
  border-top-right-radius: 0px ;
}
    </style>
    @stop 
@section('content')
<div class="row">

                    <div class="col-md-3">

                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Ticket</h3>
                            </div>
                            <form action="">
                            <div class="box-body">
                                
                                    <label for="">Terminal</label>
                                    <select @if(is_null($terminals->first())){{'disabled'}}@endif name="terminal" id="terminal" class="form-control">
                                        @if(is_null($terminals->first()))
                                            <option value="">No Available Data</option>
                                        @else
                                            @foreach($terminals as $terminal)
                                                <option value="{{$terminal->terminal_id}}">{{$terminal->description}}</option>
                                            @endforeach
                                        @endif
                                     </select>
                                     <label for="">Destination</label>
                                    <select name="destination" id="destination" class="form-control">
                                    </select>
                                    <label for="">Discount</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                          <input id="checkDiscount" type="checkbox">
                                        </span>
                                        <select name="discount" id="discount" class="form-control">
                                     </select>
                                    </div>
                                    <label for="">Ticket</label>
                                        <select id="ticket" class="form-control select2" multiple="multiple" data-placeholder="Select Ticket">
                                        </select>
                            </div>

                            <div class="box-footer">
                                <div id="sellButtContainer" class="pull-right"></div>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">

                                @foreach($terminals as $terminal)
                                    @if($terminal->trips->where('queue_number',1)->first()->plate_number ?? null)
                                    <li class="@if($terminals->first() == $terminal){{'active'}}@endif"><a href="#terminal{{$terminal->terminal_id}}" data-toggle="tab">{{$terminal->description}}</a></li>
                                    @endif
                                @endforeach

                            </ul>
                        
                            <div class="tab-content">
                                @foreach($terminals as $terminal)
                                    @if($terminal->trips->where('queue_number',1)->first()->plate_number ?? null)
                                <div class="tab-pane @if($terminals->first() == $terminal){{'active'}}@endif" id="terminal{{$terminal->terminal_id}}">
                                    <div id="sellTickets{{$terminal->terminal_id}}" class="row">
                                        <div id="list-left1" class="dual-list list-left col-md-5">
                                            <div class="box box-solid ticket-box">
                                                <div id="ondeck-header" class="box-header bg-blue">
                                                    <span class="col-md-6">
                                                        <h6>On Deck:</h6>
                                                         <h4>{{$terminal->trips->where('queue_number',1)->first()->plate_number}}</h4>
                                                    </span>
                                                     <span class="pull-right btn-group">
                                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="dropdown" style="border-radius: 100%">
                                                            <i class="fa fa-gear"></i>
                                                              <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu" style="border-color: #999999;">
                                                            <li><a href="#"><i class="fa fa-trash"></i> Remove</a></li>
                                                            <li><a href="#"><i class="fa fa-edit"></i> Change Driver</a></li>
                                                        </ul>
                                                        <button class="btn btn-sm btn-primary" style="border-radius: 100%">
                                                            <i class="fa fa-exchange"></i>
                                                        </button>
                                                    </span>
                                                </div>

                                                <div class="box-body well">
                                                    <div class="text-right">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="btn-group">
                                                                    <a class="checkBox{{$terminal->terminal_id}} btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class=" glyphicon glyphicon-search"></i>
                                                                    </span>
                                                                    <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                        <ul id="onBoardList{{$terminal->terminal_id}}" class="list-group scrollbar scrollbar-info thin ticket-overflow">
                                                            @foreach($terminal->transactions->where('status','OnBoard') as $transaction)
                                                                <li data-val="{{$transaction->transaction_id}}" class="list-group-item">{{$transaction->ticket->ticket_number}}</li>
                                                            @endforeach
                                                        </ul>
                                                        </div>
                                                    </div>
                                                    <div class="text-center ">
                                                        <button name="depart" value="{{$terminal->terminal_id}}" href="" class="btn btn-primary btn-flat">Depart <i class="fa fa-automobile"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="list-arrows col-md-2 text-center">
                                            <button id="board{{$terminal->terminal_id}}" class="btn btn-outline-primary btn-sm btn-flat move-left1">
                                                <i class="glyphicon glyphicon-chevron-left"></i>  BOARD
                                            </button>
                                            <br>
                                            <button id="unboard{{$terminal->terminal_id}}" class="btn btn-outline-warning btn-sm btn-flat move-right1">
                                                 UNBOARD <i class="glyphicon glyphicon-chevron-right"></i>
                                            </button>
                                        </div>
                                        
                                        <div id="list-right1" class="dual-list list-right col-md-5">
                                            <div class="box box-solid ticket-box">
                                                <div class="box-header bg-yellow bg-gray">
                                                    <span class="">
                                                        <h6>Sold Tickets for</h6>
                                                         <h4>{{$terminal->description}}</h4>
                                                    </span>
                                                </div>
                                                <div class="box-body well">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="btn-group">
                                                                    <a class="checkBox{{$terminal->terminal_id}} btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="glyphicon glyphicon-search"></i>
                                                                    </span>
                                                                    <input type="text" name="SearchDualList" class="form-control" placeholder="search" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul id="pendingList{{$terminal->terminal_id}}" class="list-group scrollbar scrollbar-info thin ticket-overflow">
                                                            @foreach($terminal->transactions->where('status','Pending') as $transaction)
                                                                <li data-val='{{$transaction->transaction_id}}' class="list-group-item">{{$transaction->ticket->ticket_number}}</li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="text-center ">
                                                        <button type="button" id="managePageBtn" class="btn btn-outline-secondary btn-flat">Manage Tickets <i class=""></i></button>
                                                    </div>
                                                        
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div id="manageTickets{{$terminal->terminal_id}}">
                                       <div class="pull-left col-md-6">
                                            <button id="boardPageBtn" class="btn btn-outline-secondary btn-sm btn-flat"><i class="fa fa-chevron-left"></i> Board Tickets</button>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm  btn-flat checkbox-toggle"><i class="fa fa-square-o"></i>
                                                </button>
                                                <button type="button" class="btn btn-default btn-sm btn-flat"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </div>
                                    <table id="sold-tickets" class="table table-bordered sold-tickets">
                                        <thead>
                                            <tr>
                                              <th>Ticket No.</th>
                                              <th>Destination</th>
                                              <th>Date Purchased</th>
                                              <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transactions as $transaction)
                                            <tr>
                                              <td><input type="checkbox"> {{ $transaction->ticket_id }}</td>
                                              <td>{{ $transaction->destination->description}}</td>
                                              <td>{{ $transaction->created_at }}</td>
                                              <td>
                                                <button class="btn btn-primary"><i class="fa fa-money"></i> Refund</button>
                                                <button class="btn btn-info"><i class="fa fa-edit"></i> Change Destination</button>
                                                <button class="btn btn-outline-danger"><i class="fa fa-trash"></i> Delete</button>
                                              </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                  
                                    </div>  
                                </div>
                                    @endif
                                    @endforeach
                            </div>

                        </div>


                    </div>
                </div>
@endsection
@section('scripts')
@parent

<script>
	$(function () {
	 $('.select2').select2()
	})
</script>
<script>
	

    $(function(){

     var activeTab = document.location.hash;
    if(!activeTab){

            activeTab = @if($terminals->first()->terminal_id ?? null)
                "{{'#terminal'.$terminals->first()->terminal_id}}";
        @else
                {{''}}
        @endif
    }

     $(".tab-pane").removeClass("active in");
     $(".tab-menu").removeClass("active in"); 
     $(activeTab).addClass("active");
     $(activeTab + "-menu").addClass("active");

     $('a[href="#'+ activeTab +'"]').tab('show');
     window.location.hash = activeTab;

    });



    $(function(){
      var hash = window.location.hash;
      hash && $('ul.nav a[href="' + hash + '"]').tab('show');

      $('.nav-tabs a').click(function (e) {
      $(this).tab('show');
      var scrollmem = $('body').scrollTop() || $('html').scrollTop();
      window.location.hash = this.hash;
      $('html,body').scrollTop(scrollmem);
      });

    @if(!is_null($terminals->first()))
        $('#destination').prop('disabled',false);
        $('#checkDiscount').prop('disabled',false);
        listDestinations();
        listTickets();
    @else
        $('#checkDiscount').prop('disabled',true);
        $('#destination').prop('disabled',true);
        $('#destination').append('<option>Data Not Available</option>');

        $('#ticket').prop('disabled',true);
        $('#ticket').append('<option>Data Not Available</option>');
    @endif


    checkDiscountBox();

    $('#checkDiscount').on('click',function(){
        checkDiscountBox();
    });

    $('#terminal').on('change',function(){
        listDestinations();
        listTickets();
    });


    $(document).ajaxStop(function(){
        checkSellButton();

    });

    $('button[name="depart"]').on('click', function(e){
        var terminalId = $(e.currentTarget).val();

        if($('#onBoardList'+terminalId).children().length > 0){
            var transactions = [];
               $('#onBoardList'+terminalId+' li').each(function(){
                    transactions.push($(this).data('val'));
                    console.log(transactions);
               });

                $.ajax({
                    method:'PATCH',
                    url: '/home/transactions/'+terminalId,
                    data: {
                        '_token': '{{csrf_token()}}',
                        'transactions' : transactions
                    },
                    success: function(){
                        location.reload();
                    }

                });
        }
    });

    $(document.body).on('click','#sellButt',function(){
        var terminal = $('#terminal').val();
        var destination = $('#destination').val();
        var discount = $('#discount').val();
        var ticket= $('#ticket').val();

        $.ajax({
            method:'POST',
            url: '{{route("transactions.store")}}',
            data: {
                '_token': '{{csrf_token()}}',
                'terminal': terminal,
                'destination': destination,
                'discount': discount,
                'ticket': ticket
            },
            success: function(){
                location.reload();
            }

        });

    });


    function checkDiscountBox(){
            if($('#checkDiscount').is(':checked')){
                $('#discount').prop('disabled',false);
                listDiscounts();
            }else{
                $('#discount').prop('disabled',true);
                $('#discount').empty();
            }
        }
        function listDiscounts(){
            $('#discount').empty();

            $.ajax({
                method:'GET',
                url: '{{route('transactions.listDiscounts')}}',
                data: {
                    '_token': '{{csrf_token()}}'
                },
                success: function(discounts){
                    console.log(discounts);
                    if(discounts.length === 0){
                        $('#checkDiscount').prop('disabled',true);
                        $('#discount').prop('disabled',true);
                        $('#discount').append('<option>Data Not Available</option>');
                    }
                    else{
                        $('#checkDiscount').prop('disabled',false);
                        discounts.forEach(function(discounts){
                            $('#discount').append('<option value='+discounts.id+'> '+discounts.description+'</option>');
                        });
                    }

                }
            });

        }

        function listDestinations(){
            $('#destination').empty();

            $.ajax({
                method:'GET',
                url: '/listDestinations/'+$('#terminal').val(),
                data: {
                    '_token': '{{csrf_token()}}'
                },
                success: function(destinations){
                    console.log(destinations);
                    if(destinations.length === 0){
                        $('#destination').empty();
                        $('#destination').prop('disabled',true);
                        $('#destination').append('<option>Data Not Available</option>');
                    }
                    else{
                        destinations.forEach(function(destination){
                            $('#destination').append('<option value='+destination.id+'> '+destination.description+'</option>');
                        });
                    }

                }
            });
        }

        function listTickets(){
            $('#ticket').empty();

            $.ajax({
                method:'GET',
                url: '/listTickets/'+$('#terminal').val(),
                data: {
                    '_token': '{{csrf_token()}}'
                },
                success: function(tickets){
                    console.log(tickets);
                    if(tickets.length === 0){
                        $('#ticket').empty();
                        $('#ticket').prop('disabled',true);
                        $('#ticket').append('<option>Data Not Available</option>');
                    }
                    else{
                        tickets.forEach(function(ticket){
                            $('#ticket').append('<option value='+ticket.id+'> '+ticket.ticket_number+'</option>');
                        });
                    }

                }
            });
        }

        function checkSellButton(){
            var terminal = $('#terminal').val();
            var destination = $('#destination').val();
            var ticket = $('#ticket').val();

            if(terminal != null && destination != null && ticket != null){
                if(!$('#sellButt').length){
                    $('#sellButtContainer').append('<button id="sellButt" type="button" class="btn btn-info btn-flat">Sell</button>');
                }
            }


        }

    });
</script>

<script type="text/javascript">
        $(function () {
            $('body').on('click', '.list-group .list-group-item', function () {
                $(this).toggleClass('active');
            });

            @foreach($terminals as $terminal)
            $('#board{{$terminal->terminal_id}}').on('click', function () {

                var actives = $('#pendingList{{$terminal->terminal_id}}').children('.active');
                if (actives.length > 0) {
                    var transactions = [];

                    actives.each(function () {
                        transactions.push($(this).data('val'));
                    });

                    $.ajax({
                        method:'PATCH',
                        url: '{{route("transactions.updatePendingTransactions")}}',
                        data: {
                            '_token': '{{csrf_token()}}',
                            'transactions':transactions
                        },
                        success: function(){
                        console.log('success');
                        }
                    });

                    actives.clone().appendTo('#onBoardList{{$terminal->terminal_id}}').removeClass('active');
                    actives.remove();

                    var checkBox = $('.checkBox{{$terminal->terminal_id}}');

                    if (checkBox.hasClass('selected') && checkBox.children('i').hasClass('glyphicon-check')) {
                        checkBox.removeClass('selected');
                        checkBox.children('i').removeClass('glyphicon-check').addClass('glyphicon-unchecked');
                    }

                }
            });

            $('#unboard{{$terminal->terminal_id}}').on('click',function() {
                var actives = $('#onBoardList{{$terminal->terminal_id}}').children('.active');

                if (actives.length > 0) {
                    var transactions = [];
                    actives.each(function () {
                        transactions.push($(this).data('val'));
                    });

                    $.ajax({
                        method: 'PATCH',
                        url: '{{route("transactions.updateOnBoardTransactions")}}',
                        data: {
                            '_token': '{{csrf_token()}}',
                            'transactions': transactions
                        },
                        success: function () {
                            console.log('success');
                        }
                    });


                    actives.clone().appendTo('#pendingList{{$terminal->terminal_id}}').removeClass('active');
                    actives.remove();

                    var checkBox = $('.checkBox{{$terminal->terminal_id}}');

                    if (checkBox.hasClass('selected') && checkBox.children('i').hasClass('glyphicon-check')) {
                        checkBox.removeClass('selected');
                        checkBox.children('i').removeClass('glyphicon-check').addClass('glyphicon-unchecked');
                    }
                }
            });


            $('.checkBox{{$terminal->terminal_id}}').on('click',function(e) {
                var checkBox = $(e.currentTarget);
                if (!checkBox.hasClass('selected')) {
                    checkBox.addClass('selected').closest('.well').find('ul li:not(.active)').addClass('active');
                    checkBox.children('i').removeClass('glyphicon-unchecked').addClass('glyphicon-check');
                } else {
                    checkBox.removeClass('selected').closest('.well').find('ul li.active').removeClass('active');
                    checkBox.children('i').removeClass('glyphicon-check').addClass('glyphicon-unchecked');
                }
            });
            @endforeach

            $('[name="SearchDualList"]').keyup(function (e) {
                var code = e.keyCode || e.which;
                if (code == '9') return;
                if (code == '27') $(this).val(null);
                var $rows = $(this).closest('.dual-list').find('.list-group li');
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                $rows.show().filter(function () {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });

        });
</script>

<script>
    @foreach($terminals as $terminal)
     $(document).ready(function(){
        $("#manageTickets{{$terminal->terminal_id}}").hide();
        $("#managePageBtn").click(function(){
            $("#sellTickets{{$terminal->terminal_id}}").hide();
            $("#manageTickets{{$terminal->terminal_id}}").show();
        })
        $("#boardPageBtn").click(function(){
            $("#manageTickets{{$terminal->terminal_id}}").hide();
            $("#sellTickets{{$terminal->terminal_id}}").show();
        })
      });
    @endforeach
</script>

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
<script>
    $(function() {
        $('#sold-tickets').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true,
            "order": [[ 1, "desc" ]]
        })
    })
</script>
@stop