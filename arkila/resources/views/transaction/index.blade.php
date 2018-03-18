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
                                    <select @if(is_null($terminals->first())){{'disabled'}}@endif name="" id="terminal" class="form-control">
                                        @if(is_null($terminals->first()))
                                            <option value="">No Available Data</option>
                                        @else
                                            @foreach($terminals as $terminal)
                                                <option value="{{$terminal->terminal_id}}">{{$terminal->description}}</option>
                                            @endforeach
                                        @endif
                                     </select>
                                     <label for="">Destination</label>
                                    <select name="" id="destination" class="form-control">
                                    </select>
                                    <label for="">Discount</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                          <input id="checkDiscount" type="checkbox">
                                        </span>
                                        <select name="discount" id="discount" class="form-control">
                                     </select>
                                    </div>
                                
                            </div>

                            <div class="box-footer ">
                                <div class="pull-right">
                                    <div class="input-group ">
                                        <span class="input-group-addon">
                                            <i class="fa fa-ticket"></i>
                                        </span>
                                        <select id="ticket" class="form-control select2" name="" id="">
                                        </select>
                                        <span id="sellButtContainer" class="input-group-btn">
                                          <button id="sellButt" type="button" class="btn btn-info btn-flat">Sell</button>
                                        </span>
                                    </div>
                                </div>
                                
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#terminal1" data-toggle="tab">Terminal 1</a></li>
                              <li><a href="#terminal2" data-toggle="tab">Terminal 2</a></li>
                            </ul>
                        
                            <div class="tab-content">
                                <div class="tab-pane active" id="terminal1">
                                    <div class="row">
                                                    <div id="list-left1" class="dual-list list-left col-md-5">
                                                        <div class="box box-solid ticket-box">
                                                            <div id="ondeck-header" class="box-header bg-blue">
                                                                <span class="col-md-6">
                                                                    <h6>On Deck:</h6>
                                                                     <h4>AAA-123</h4>
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
                                                                                <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
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
                                                                    <ul class="list-group scrollbar scrollbar-info thin ticket-overflow">
                                                                        <li class="list-group-item">T1 Ticket 1</li>
                                                                        <li class="list-group-item">T1 Ticket 2</li>
                                                                        <li class="list-group-item">T1 Ticket 3</li>
                                                                        <li class="list-group-item">T1 Ticket 4</li>
                                                                        <li class="list-group-item">T1 Ticket 5</li>
                                                                    </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center ">
                                                                    <a href="" class="btn btn-primary btn-flat">Depart <i class="fa fa-automobile"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="list-arrows col-md-2 text-center">
                                                        <button class="btn btn-outline-primary btn-sm btn-flat move-left1">
                                                            <i class="glyphicon glyphicon-chevron-left"></i>  BOARD
                                                        </button>
                                                        <br>
                                                        <button class="btn btn-outline-warning btn-sm btn-flat move-right1">
                                                             UNBOARD <i class="glyphicon glyphicon-chevron-right"></i>
                                                        </button>
                                                    </div>
                                                    
                                                    <div id="list-right1" class="dual-list list-right col-md-5">
                                                        <div class="box box-solid ticket-box">
                                                            <div class="box-header bg-yellow bg-gray">
                                                                <span class="">
                                                                    <h6>Sold Tickets for</h6>
                                                                     <h4>Cabanatuan Terminal</h4>
                                                                </span>
                                                            </div>
                                                            <div class="box-body well">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <div class="btn-group">
                                                                                <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
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
                                                                    <ul class="list-group scrollbar scrollbar-info thin ticket-overflow">
                                                                        <li class="list-group-item">T1 Ticket 6</li>
                                                                        <li class="list-group-item">T1 Ticket 7</li>
                                                                        <li class="list-group-item">T1 Ticket 8</li>
                                                                        <li class="list-group-item">T1 Ticket 9</li>
                                                                        <li class="list-group-item">T1 Ticket 10</li>
                                                                    </ul>
                                                                    <div class="text-center ">
                                                                    <a href="" class="btn btn-outline-secondary btn-flat">Manage Tickets <i class=""></i></a>
                                                                </div>
                                                                    
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>  
                                </div>
                                <div class="tab-pane" id="terminal2">
                                    <div class="row">
                                                    <div class="dual-list list-left col-md-5">
                                                        <div class="box box-solid ">
                                                            <div class="box-header bg-green text-center">
                                                                <h3 class="box-title">ON BOARD</h3>
                                                            </div>
                                                            <div class="box-body well">
                                                                <div class="text-right">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <div class="btn-group">
                                                                                <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
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
                                                                    <ul class="list-group scrollbar scrollbar-info thin ticket-overflow">
                                                                        <li class="list-group-item">T2 Ticket 1</li>
                                                                        <li class="list-group-item">T2 Ticket 2</li>
                                                                        <li class="list-group-item">T2 Ticket 3</li>
                                                                        <li class="list-group-item">T2 Ticket 4</li>
                                                                        <li class="list-group-item">T2 Ticket 5</li>
                                                                    </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="text-center ">
                                                                    <a href="" class="btn btn-success btn-flat">Depart <i class="fa fa-automobile"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="list-arrows col-md-2 text-center">
                                                        <button class="btn btn-outline-success btn-sm btn-flat ">
                                                            <i class="glyphicon glyphicon-chevron-left move-left"></i>  BOARD
                                                        </button>
                                                        <br>
                                                        <button class="btn btn-outline-secondary btn-sm btn-flat">
                                                             UNBOARD <i class="glyphicon glyphicon-chevron-right move-right"></i>
                                                        </button>
                                                    </div>
                                                    
                                                    <div class="dual-list list-right col-md-5">
                                                        <div class="box box-solid">
                                                            <div class="box-header bg-gray text-center">
                                                                <h3 class="box-title">SOLD TICKETS</h3>
                                                            </div>
                                                            <div class="box-body well">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <div class="btn-group">
                                                                                <a class="btn btn-default selector" title="select all"><i class="glyphicon glyphicon-unchecked"></i></a>
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
                                                                    <ul class="list-group list-group scrollbar scrollbar-info thin ticket-overflow">
                                                                        <li class="list-group-item">T2 Ticket 6</li>
                                                                        <li class="list-group-item">T2 Ticket 7</li>
                                                                        <li class="list-group-item">T2 Ticket 8</li>
                                                                        <li class="list-group-item">T2 Ticket 9</li>
                                                                        <li class="list-group-item">T2 Ticket 10</li>
                                                                    </ul>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>    
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
	 $('.select2').select2()
	})
</script>
<script>
	

    $(function(){
     var url = window.location.href;
     var activeTab = document.location.hash
     $
     $(".tab-pane").removeClass("active in"); 
     $(".tab-menu").removeClass("active in"); 
     $(activeTab).addClass("active");
     $(activeTab + "-menu").addClass("active");

     $('a[href="#'+ activeTab +'"]').tab('show')
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

            }

        }

    });
</script>

<script type="text/javascript">
        $(function () {



            $('body').on('click', '.list-group .list-group-item', function () {
                $(this).toggleClass('active');
            });
            $('.list-arrows button').click(function () {
                var $button = $(this), actives = '';
                if ($button.hasClass('move-left1')) {
                    actives = $('#list-right1 .list-group li.active');
                    actives.clone().appendTo('#list-left1 .list-group')
                    actives.remove();
                } else if ($button.hasClass('move-right1')) {
                    actives = $('#list-left1 .list-group li.active');
                    actives.clone().appendTo('#list-right1 .list-group').removeClass('active');
                    actives.remove();
                }
            });
            $('.dual-list .selector').click(function () {
                var $checkBox = $(this);
                if (!$checkBox.hasClass('selected')) {
                    $checkBox.addClass('selected').closest('.well').find('ul li:not(.active)').addClass('active');
                    $checkBox.children('i').removeClass('glyphicon-unchecked').addClass('glyphicon-check');
                } else {
                    $checkBox.removeClass('selected').closest('.well').find('ul li.active').removeClass('active');
                    $checkBox.children('i').removeClass('glyphicon-check').addClass('glyphicon-unchecked');
                }
            });
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
@stop