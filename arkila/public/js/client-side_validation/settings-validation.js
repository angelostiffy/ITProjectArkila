	// Validate settings.
	    $('[val-settings-desc]').parsley({
	      maxlength: 40,
	      pattern: /^[a-zA-Z]$|^[a-zA-Z][a-zA-Z\s-]*[a-zA-Z]$/,
	      minlength: 3
	    });	

	    $('[val-settings-amount]').parsley({
	      range: [1,5000]
	    });	


/** TERMINAL VALIDATION **/
	// Validate required desc
	    $('[name="addTerminalName"]').attr('data-parsley-required-message','Please enter a terminal name.');
	    $('[name="addDestination"]').attr('data-parsley-required-message','Please enter a destination description.');
	    $('[name="addDiscountDesc"]').attr('data-parsley-required-message','Please enter a discount description.');
	    $('[name="addFeesDesc"]').attr('data-parsley-required-message','Please enter a fee description.');
	// Validate amount.
	    $('[name="bookingFee"]').attr('data-parsley-required-message','Please enter a booking fee.');
	    $('[name="addDestinationFare"]').attr('data-parsley-required-message','Please enter a fare.');
	    $('[name="addDiscountAmount"]').attr('data-parsley-required-message','Please enter an amount.');
	    $('[name="addFeeAmount"]').attr('data-parsley-required-message','Please enter an amount.');

	    $('[name="editBookingFee"]').attr('data-parsley-required-message','Please enter a booking fee.');
	    $('[name="editDestinationFare"]').attr('data-parsley-required-message','Please enter a fare.');
	    $('[name="editDiscountAmount"]').attr('data-parsley-required-message','Please enter an amount.');
	    $('[name="editFeeAmount"]').attr('data-parsley-required-message','Please enter an amount.');