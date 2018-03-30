@extends('layouts.driver') @section('title', 'Driver Profile') 
@section('content-title', 'Driver Home') 
@section('content')
<div class="content-wrapper">
            <section class="content">
                <div id="content">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-header">
                                    <h4>Trip Log Details</h4>
                                </div>
                                <div class="box-body">
                                    <div class="form-group col-md-6" class="control-label">
                                        <label for="">Date:</label>

                                        <input value="" id="" name="" type="text" class="form-control" disabled>

                                    </div>
                                    <div class="form-group col-md-6" class="control-label">
                                        <label for="">Time:</label>

                                        <input value="" id="" name="" type="text" class="form-control" disabled>

                                    </div>
                                    <div class="form-group col-md-6" class="control-label">
                                        <label for="">Origin:</label>

                                        <input value="" id="" name="" type="text" class="form-control" disabled>

                                    </div>
                                    <div class="form-group col-md-6" class="control-label">
                                        <label for="">Destination:</label>

                                        <input value="" id="" name="" type="text" class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="box">
                                    <div class="box-header">
                                        <h4>Destination</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <div class="form-group">

                                                    <label for="">Baguio : </label>
                                                    <input class="form-control pull-right" onblur="findTotal()" type="text" name="qty" id="qty4" style="width:30%;" disabled>
                                                </div>
                                                <div class="form-group">

                                                    <label for="">Nueva Ecija : </label>
                                                    <input class="form-control pull-right" onblur="findTotal()" type="text" name="qty" id="qty4" style="width:30%;" disabled>
                                                </div>
                                                <div class="form-group">

                                                    <label for="">Total</label>
                                                    <input class="form-control pull-right" type="text" name="total" id="total" style="width:30%;" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer text-center">
                                    <p>Your income for this trip: Php <strong>3500.00</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection