@extends('layouts.form')
@section('title', 'Manange Users')
@section('form-title', 'Manage Account')
@section('links')
@parent
  <link rel="stylesheet" href="public\css\myOwnStyle.css">
  @stop
@section('content')
@section('form-body')
          

  <div class="form-group">
    <label for="payor">User name:</label>
    <span>Span</span>
  </div>
  <div class="form-group">
    <label for="Particulars">Name:</label>
    <span>Yuki Marfil</span>
  </div>
  <div class="form-group">
    <label for="Particulars">Email Address:</label>
    <span>yuki@grkngc.com</span>
  </div>

  <div>
  <button type="button" class="btn btn-danger" data-dismiss="modal">Reset Password</button> </div>                 
              
                    
                    
                    
                    <div class="col-md-4">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Advanced Features</h3>

                                <div class="box-tools">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                                </div>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"><i class="fa fa-inbox"></i> Online Reservation Feature
                  <span class="label pull-right">         
                      <label class="switch">
                          <input type="checkbox">
                          <span class="slider round"></span>
                      </label>
                  </span></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-inbox"></i> Walk-in Reservation Feature
                  <span class="label pull-right">         
                      <label class="switch">
                          <input type="checkbox">
                          <span class="slider round"></span>
                      </label>
                  </span></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-inbox"></i> Van Rental Feature
                  <span class="label pull-right">         
                      <label class="switch">
                          <input type="checkbox">
                          <span class="slider round"></span>
                      </label>
                  </span></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /. box -->
                    </div>


                   
@endsection
@section('form-btn')     
   <button type="button" class="btn btn-primary" data-dismiss="modal">Save Changes</button>
   <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

@endsection

@section('scripts')
@parent
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