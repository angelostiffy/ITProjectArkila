
@extends('layouts.form') 
@section('title', 'Add Van Driver')
@section('back-link',URL::previous())


@section('form-title', 'Add Van-Driver')
@section('form-body')
    @include('message.error')

    <div class="form-group">
        <label for="">Operator:</label> <span></span>
    
    </div>
    
	<div class="form-group">
        <label for="">Plate Number:</label>
        <input value="" name="plateNumber" type="text" class="form-control" placeholder="Plate Number" disabled>
    </div>
    <div class="form-group">
        <label for="">Van Model</label>
        <input value="" name="vanModel" type="text" class="form-control" placeholder="Van Model" disabled>
    </div>

    <div class="form-group">
        <label for="">Seating Capacity</label>
        <input value="" name="seatingCapacity" type="number" class="form-control" placeholder="Seating Capacity" max="16" min="1" disabled>
      
    </div>
    
    <div class="form-group">
    <label for="">Driver</label>

        <select name="driver" id="driver" class="form-control select2"></select>
        
    </div>
@endsection 

@section('others')
<div class="form-group">
       <span id ="checkBox">
           <input name="addDriver" type="checkbox" class="minimal"> <span>Add new driver to this van unit</span>

       </span>


@endsection

@section('form-btn')
<a class="btn btn-primary" data-toggle="modal" data-target="#form-modal">Add Van-Driver</a>
@endsection 
@section('modal-title', 'Alert') 
@section('modal-body')
<h4>Are you sure you want to add?</h4>
@endsection 
@section('modal-btn')
<button type="submit" class="btn btn-primary"> Yes</button>
<button type="submit" class="btn btn-default"> No</button>
@endsection
@section('scripts')
	@parent
	<script>
        $(function () {
            $('.select2').select2();

            $('input[type="checkbox"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
            });

            checkBoxChecker();
            @if(isset($operators))
                $('select[name="driver"]').empty();
                listDrivers();
            @endif
    });

        $('#driver').on('change', function() {
            if(this.value.trim().length === 0 && $('#checkBox').is(':empty')){
                    $('#checkBox').append('<input name="addDriver" type="checkbox" class="minimal"> <span>Add new driver to this van unit</span>');
            }else{
                    $('#checkBox').empty();
            }
            $('input[type="checkbox"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue'
            });
            checkBoxChecker();
        });


        function checkBoxChecker(){
            $('input[name="addDriver"]').on('ifChecked', function(){
                $('#driver').prop('disabled', true);
            });

            $('input[name="addDriver"]').on('ifUnchecked', function(){
                $('#driver').prop('disabled', false);
            });
        }
@if(isset($operators))

$('select[name="operator"]').on('change',function(){
    $('select[name="driver"]').empty();
    listDrivers();
});

 function listDrivers(){
            $.ajax({
                method:'POST',
                url: '{{route("vans.listDrivers")}}',
                data: {
                    '_token': '{{csrf_token()}}',
                    'operator':$('select[name="operator"]').val()
                },
                success: function(drivers){
                    $('[name="driver"]').append('<option value="">None</option>');
                    drivers.forEach(function(driverObj){

                        $('[name="driver"]').append('<option value='+driverObj.id+'> '+driverObj.name+'</option>');
                    })
                }

            });
}
        @endif
	</script>
@endsection


