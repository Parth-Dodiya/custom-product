(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$( document ).ready(function() {
	    $('#save_product .submit button').on("click", function(e){
			var formData =  $('form#save_product').serializeArray();
			var hobby = [];
			jQuery("input:checkbox[name='hobby[]']:checked").each(function(){
			    hobby.push(jQuery(this).val());
			});

	        $.ajax({
	            type : "POST",
	            dataType : "json",
	            url : ajax_object.ajaxurl,
	            data : {action: "save_product", data: formData, hobbies: hobby, security: formData[0].value },
	            success: function(response) {
                	$('.error-title, .error-description, .error-email').css('display', 'none');
	                
                	if (response && typeof response === 'object') {
	                    if (response.success) {
	                        // Form submitted successfully, perform actions here
	                        alert('Product created successfully!');
	                    } else {
	                        if (response.data && typeof response.data === 'object') {
	                            if (response.data.title) {
	                                $('.error-title').css('display', 'block');
	                            }
	                            if (response.data.description) {
	                                $('.error-description').css('display', 'block');
	                            }
	                            if (response.data.email) {
	                                $('.error-email').css('display', 'block');
	                            }
	                        }
	                    }
	                } else {
	                    console.log('Unexpected AJAX response:', response);
	                    alert('An unexpected error occurred. Please try again.');
	                }
	            },
	            error: function(xhr, status, error) {
	                console.log(xhr.responseText);
	            }
	        });
	    });
	});
})( jQuery );
