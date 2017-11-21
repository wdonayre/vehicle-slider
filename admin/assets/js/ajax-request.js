jQuery(document).ready(function($) {
	
	jQuery.ajax({
		url : gltv_request_ajax.ajax_url,
		type : 'get',
		data : {
			action : 'gltv_request_ajax'
		},
		success : function( response ) {
			console.log( response );
		}
	});
		
});