@extends('layouts.form_lg') 
@section('title', 'Book a Seat') 
@section('form-id', 'regForm') 
@section('form-action', route('reservations.store')) 
@section('form-method', 'POST') 
@section('form-body') {{csrf_field()}}
@section('backRef') {{ route('reservations.index') }} @endsection

<div class="box box-success">
    <div class="box-header with-border text-center">
        <a href="@yield('backRef')"><i class="fa  fa-chevron-left"></i></a>
        <h3 class="box-title">
            Book a Seat
        </h3>
    </div>
    <div class="box-body">
    @include('message.error')

        <div class="form-section">
            <h4>Trip Information</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Name: <span class="text-red">*</span></label>
                        <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ old('name') }}" val-fullname required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Contact Number: <span class="text-red">*</span></label>
                        <div class = "input-group">  
                            <div class = "input-group-addon">
                                <span>+63</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Contact Number" name="contactNumber" id="contactNumber" value="{{ old('contactNumber') }}" data-inputmask='"mask": "999-999-9999"' data-mask data-parsley-errors-container="#errContactNumber" data-mask val-phone required>
                        </div>
                        <p id="errContactNumber"></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Departure Date: <span class="text-red">*</span></label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="date" id="date" class="form-control" placeholder="mm/dd/yyyy" value="{{old('date')}}" data-inputmask=" 'alias': 'mm/dd/yyyy'" data-mask data-parsley-errors-container="#errDepartureDate" data-mask val-book-date data-parsley-valid-departure required>
                        </div>
                        <p id="errDepartureDate"></p>    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Destination: <span class="text-red">*</span></label>
                        <select class="form-control select2" name="dest" id="dest" required>
                                    <option value="" disabled selected>Select Destination</option>
                                @foreach ($destinations as $destination)
                                   <option value="{{ $destination->description }}" @if($destination->description == old('dest') ) {{'selected'}} @endif>{{ $destination->description }}</option>
                                   @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Number of Seats: <span class="text-red">*</span></label>
                        <input type="number" class="form-control" placeholder="Number of Seats" name="seat" id="seat" value="{{ old('seat') }}" val-num-seats required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Departure Time: <span class="text-red">*</span></label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" class="form-control" id="timepicker" name="time" value="{{ old('time') }}" data-parsley-errors-container="#errDepartureTime" val-book-time required>
                            </div>
                            <p id="errDepartureTime"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-section" style="margin-left:37%; font-size: 14pt">
        <h4 style="margin-left:17%; margin-bottom:3%; font-size: 14pt">Summary</h4>
        <div class="row">
            <dl class="dl-horizontal">
                <dt>Name:</dt>
                <dd id="nameView"></dd>
                <dt>Destination:</dt>
                <dd id="destView"></dd>
                <dt>Number of Days:</dt>
                <dd id="seatView"></dd>
                <dt>Contact Number:</dt>
                <dd id="contactView"></dd>
                <dt>Departure Date:</dt>
                <dd id="dateView"></dd>
                <dt>Departure Time:</dt>
                <dd id="timeView"></dd>
            </dl>
        </div>
    </div>
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
    </div>

    <div class="box box-footer">
        <div class="form-navigation" style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" class="previous btn btn-default">Previous</button>
                <button type="button" id="nextBtn" onclick="getData();" class="next btn btn-primary">Next</button>
            </div>
        </div>
    </div>
</div>

@endsection @section('scripts') @parent
<script>
    
    $(function() {

        //Date picker
        $('#timepicker').timepicker({
            showInputs: false
            // startTime: new Time();
        })

    })
</script>



<script type="text/javascript">
        $(function () {
          var $sections = $('.form-section');

          function navigateTo(index) {
            // Mark the current section with the class 'current'
            $sections
              .removeClass('current')
              .eq(index)
                .addClass('current');
            // Show only the navigation buttons that make sense for the current section:
            $('.form-navigation .previous').toggle(index > 0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type=submit]').toggle(atTheEnd);
          }

          function curIndex() {
            // Return the current index by looking at which section has the class 'current'
            return $sections.index($sections.filter('.current'));
          }

          // Previous button is easy, just go back
          $('.form-navigation .previous').click(function() {
            navigateTo(curIndex() - 1);
          });

          // Next button goes forward iff current block validates
          $('.form-navigation .next').click(function() {
            $('.parsley-form').parsley().whenValidate({
              group: 'block-' + curIndex()
            })  .done(function() {
              navigateTo(curIndex() + 1);
            });
          });

          // Prepare sections by setting the `data-parsley-group` attribute to 'block-0', 'block-1', etc.
          $sections.each(function(index, section) {
            $(section).find(':input').attr('data-parsley-group', 'block-' + index);
          });
          navigateTo(0); // Start at the beginning
        });
    </script>

    <script>
        $('[data-mask]').inputmask()
    $('.date-mask').inputmask('mm/dd/yyyy',{removeMaskOnSubmit: true})
    </script>
@endsection