function classBookNow(id,type){
     console.log(jQuery(id).attr('data-class'));
	jQuery('body').find('#booking-class-id').attr('value',jQuery(id).attr('data-class'));
	var ctype = 'Waiting List';
	if(type==1){
	    ctype = 'Book Free trial';
	}
	jQuery('body').find('#booking-type-id').attr('value',ctype);
	jQuery('.openclsss').click();
}

function submitboking()
{	
	var formData = jQuery("#bookingform").serialize();	
	jQuery.ajax({
		url: my_ajax_object.ajax_url, 
		type: 'post',
		data: formData,
		success:function(data) {		
			console.log(data);
		},
		error: function(errorThrown){
			console.log(errorThrown);
		}
	});  
}

document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = window.location.href ;
}, false );
