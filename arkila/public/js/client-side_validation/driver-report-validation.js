
$('[val-date-depart]').parsley({
    	pattern: /^(0?[1-9]|1[0-2])\/(0?[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/
    });

$('[val-date-depart]').attr('data-parsley-pattern-message','Please enter a valid date format (mm/dd/yyyy).');
$('[val-date-depart]').attr('data-parsley-required-message','Please enter the date of depature.');

$('[val-time-depart]').attr('data-parsley-required-message','Please enter the time of departure.');


$('[val-report-discount]').parsley({
    	min: 0
});
