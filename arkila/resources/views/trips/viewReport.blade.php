@extends('layouts.master') 
@section('title', 'Report Details')
@section('links')
@section('content')

<div class="box" style="box-shadow: 0px 5px 10px gray;">
    <div class="box-header with-border text-center">
        <a href="{{route('trips.driverReport')}}" class="pull-left btn btn-default"><i class="fa  fa-chevron-left"></i></a>
        <h3 class="box-title">
            Driver Report Details
        </h3>
    </div>
    <div class="box-body">
        <div class="box" >
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div style="width:70%">
                            <div class="header text-center">
                                <h4>Destination</h4>
                            </div>
                            <div class="box-body" id="inner-dest">

                                <!-- dito mag loop :) -->
                                <div class="form-group inner-routes">
                                    <label for="">Agoo</label>
                                    <input class="form-control pull-right" type="number" id="" style="width:30%;" value="" disabled>
                                </div>
                                
                                <div class="form-group inner-routes">
                                    <label for="">Agoo</label>
                                    <input class="form-control pull-right" type="number" id="" style="width:30%;" value="" disabled>
                                </div>
                                <div class="form-group inner-routes">
                                    <label for="">Agoo</label>
                                    <input class="form-control pull-right" type="number" id="" style="width:30%;" value="" disabled>
                                </div>
                                <div class="form-group inner-routes">
                                    <label for="">Agoo</label>
                                    <input class="form-control pull-right" type="number" id="" style="width:30%;" value="" disabled>
                                </div>
                                <div class="form-group inner-routes">
                                    <label for="">Agoo</label>
                                    <input class="form-control pull-right" type="number" id="" style="width:30%;" value="" disabled>
                                </div>
                                <div class="form-group inner-routes">
                                    <label for="">Agoo</label>
                                    <input class="form-control pull-right" type="number" id="" style="width:30%;" value="" disabled>
                                </div>
                                <div class="form-group inner-routes">
                                    <label for="">Agoo</label>
                                    <input class="form-control pull-right" type="number" id="" style="width:30%;" value="" disabled>
                                </div>

                                <label for="">Total</label>
                                <input id="" class="form-control pull-right" type="text" id="total" style="width:30%;" value="" disabled>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <div style="width:80%">
                        <div class="header text-center">
                            <h4>Summary</h4>
                        </div>
                         <div>
                            <label>Driver:</label>
                            <name>Tie </name>
                        </div>
                        <div>
                            <label>Van:</label>
                            <name>AAAA-777</name>
                        </div> 
                        <div>
                            <label>Origin:</label>
                            <name>Baguio City</name>
                        </div>
                        <div>
                            <label>Destination:</label>
                            <name>Cabanatuan</name>
                        </div>
                        <div>
                            <label>Date:</label>
                            <name>03/11/2018</name>
                        </div>
                        <div>
                            <label>Time:</label>
                            <name>12:00 PM</name>
                        </div> 
                        
                        <div class="box" style="margin: 3% 0%">
                            <div class="box-header text-center">
                                <h4>Shares</h4>
                            </div>
                            <div class="box-body" id="inner-dest">
                                <div class="form-group inner-routes">
                                    <label for="">BanTrans: </label>
                                    <input class="form-control pull-right" type="number" id="" style="width:30%;" value="" disabled>
                                </div>

                                <label for="">Driver:</label>
                                <input id="" class="form-control pull-right" type="text" id="total" style="width:30%;" value="" disabled>
                            </div>
                        </div>
                        <div class="text-center" style="margin: 5%;">
                            <button class="btn btn-success btn-sm" data-dismiss="modal"><i class="fa fa-check"></i>Accept</button>
                            <button class="btn btn-danger btn-sm"><i class="fa fa-close"></i>Decline</button>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection