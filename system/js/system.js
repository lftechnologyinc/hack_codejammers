$('document').ready(function(){
	// hide system notification msg
	$('.notification-message span').click(function(){
		$('.notification-message').fadeOut('slow');
	});
});

function ajaxload(url,container) {
	$(container).load(url);
}

function ajax($url,$postdata,$container) {
	jQuery.ajax({
		url: '',
		type: "POST",
		dataType:'json',
		//data: {order:order,type:filters},
		success: function(responses) {
			if(responses) {

			}
		}
	});
}


