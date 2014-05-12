$(document).ready(function(){

		// form validation
		$('#form').bootstrapValidator({
			message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
            country: {
                validators: {
                    notEmpty: {
                        message: 'The country is required and cannot be empty'
                    }
                }
            },
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'The input is not a valid phone number'
                    }
                }
            },
            inquiryProduct: {
                    validators: {
                        notEmpty: {
                            message: 'Please choose at least one inquiry Topic'
                        }
                    }
                }
			}
		});

		// product categories slide init
		$('.accordion').accordion();


		// order form for activating client info form
		$('.next').on("click",function(event){
			$('#clientinfo').slideDown();
			$('.delete').hide();
			event.preventDefault();
		});

}); // end document.ready