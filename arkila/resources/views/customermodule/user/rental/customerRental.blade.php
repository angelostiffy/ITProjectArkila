@extends('layouts.customer_user')
@section('content')
<section id="mainSection" style="background-image: url('{{ URL::asset('img/background.jpg') }}');">
        <div class="container">
            <div class="heading text-center">
                <h2>Rent a Van</h2>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" id="boxContainer">
                    <form class="contact100-form" action="{{route('customermodule.storeRental')}}" method="POST">
                        {{csrf_field()}}
                        <div class="wrap-input100">
                            <select id="vanType" name="van_model" class="input100">
                                
                                @foreach($vanmodels as $vanmodel)
                                    <option value="{{$vanmodel->model_id}}">{{$vanmodel->description}}</option>
                                @endforeach
                            </select>
                            <span class="focus-input100"></span>
                        </div><!-- wrap-input100-->
                        <div class="wrap-input100">
                            <input id="rentalDestination" class="input100" type="texts" name="rentalDestination" placeholder="Destination">
                            <span class="focus-input100"></span>
                        </div><!-- wrap-input100-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="wrap-input100">
                                    <input id="contactNumber" class="input100" type="text" placeholder="Contact Number" name="contactNumber" data-inputmask='"mask": "999-999-9999"' data-mask>
                                    <span class="focus-input100"></span>
                                </div><!-- wrap-input100-->
                            </div><!-- col-->
                            <div class="col-md-6">
                                <div class="wrap-input100">
                                    <input id="numberOfDays" class="input100" type="number" placeholder="Number of Days" name="numberOfDays">
                                    <span class="focus-input100"></span>
                                </div><!-- wrap-input100-->
                            </div><!-- col-->
                        </div><!-- row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="wrap-input100">
                                    <input id="date" class="input100 datepicker" type="text" name="date" placeholder="Date">
                                    <span class="focus-input100"></span>
                                </div><!-- wrap-input100-->
                            </div><!-- col-->
                            <div class="col-md-6">
                                <div class="wrap-input100">
                                    <div class="bootstrap-timepicker">
                                        <input type="text" id="timepicker" class="input100 timepicker" name="time" placeholder="Time">
                                        <span class="focus-input100"></span>
                                    </div><!-- bootstrap-timepicker-->
                                </div><!-- wrap-input100-->
                            </div><!-- col-->
                        </div><!-- row-->
                        <div class="wrap-input100">
                            <textarea id="message" class="input100" name="message" placeholder="Additional comments..."></textarea>
                            <span class="focus-input100"></span>
                        </div><!-- wrap-input100-->
                        <div class="container-contact100-form-btn">
                            <button type="button" class="contact100-form-btn" onclick="showSummary()" data-toggle="modal" data-target="#summary"><strong>Book</strong></button>
                        </div><!-- container-contact100-form-btn-->
                    
                    <!-- contact100-form-->
                </div>
                <!-- boxContainer-->
            </div>
            <!-- row-->
        </div>
        <!-- container-->
    </section>
    <!--    main section-->
    
    <!-- Success Modal-->
    <div id="summary" aria-hidden="true" class="modal fade summary-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background:#5cb85c; color:white; font-family: Montserrat-Regular;">
                    <h4 class="text-center"><i class="fa fa-check-circle" style="font-size: 80px; padding-left:200px;"></i></h4>

                </div>
                <div class="modal-body">
                    <p class="text-center" style="margin-bottom:10px;"><strong>Summary</strong></p>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Type of Vehicle</th>
                                <td id="vehicleType"></td>
                            </tr>
                            <tr>
                                <th>Destination</th>
                                <td id="dest"></td>
                            </tr>
                            <tr>
                                <th>Contact Number</th>
                                <td id="contactNo"></td>
                            </tr>
                            <tr>
                                <th>Number of Days</th>
                                <td id="numDays"></td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td id="dateDepart"></td>
                            </tr>
                            <tr>
                                <th>Time</th>
                                <td id="timeDepart"></td>
                            </tr>
                            <tr>
                                <th>Comments</th>
                                <td id="comment"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="contact100-form-btn"><strong>Submit</strong></button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('scripts')
@parent
<script>
    // $('.summary-modal').click(function(){
    //         $('#vehicleType').text($('#vanType option:selected').text());
    //         $('#dest').text($('#rentalDestination').val());
    //         $('#contactNo').text($('#contactNumber').val());
    //         $('#numDays').text($('#numberOfDays').val());
    //         $('#dateDepart').text($('#date').val());
    //         $('#timeDepart').text($('#timepicker').val());
    //         $('#comment').text($('#message').val());
    //     });
    function getVehicle(elementId){
        var sel = document.getElementById(elementId);
        if (sel.selectedIndex == -1){
            return null;
        }
        
        return sel.options[sel.selectedIndex].text;
    }
    function showSummary(){
        document.getElementById('vehicleType').textContent = getVehicle('vanType');
        document.getElementById('dest').textContent = document.getElementById('rentalDestination').value;
        document.getElementById('contactNo').textContent = document.getElementById('contactNumber').value;
        document.getElementById('numDays').textContent = document.getElementById('numberOfDays').value;
        document.getElementById('dateDepart').textContent = document.getElementById('date').value;
        document.getElementById('timeDepart').textContent = document.getElementById('timepicker').value;
        document.getElementById('comment').textContent = document.getElementById('message').value;
    }
</script>
@endsection