
function specialUnitChecker(){
    $.ajax({
        method:'POST',
        url: '{{route("trips.specialUnitChecker")}}',
        data: {
            '_token': '{{csrf_token()}}'
        },
        success: function(response){
            if(response[0]) {
                $('#confirmBoxModal').load('/showConfirmationBox/' + response[0]);
            }else{
                if(response[1]){
                    $('#confirmBoxModal').load('/showConfirmationBoxOB/'+response[1]);
                }
            }
        }

    });
}

specialUnitChecker();