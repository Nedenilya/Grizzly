$('.define').on('click', function(){
	let phone = $('.phone').val();;
	$.post('Handler.php', {
	  	phone : phone
	}).done(function(data) {
	    alert(data);
  	});
});


$('.accept_cookie').on('click', function(){
	$.cookie('dont_touch_my_cookies', 'please', { expires: 1, path: '/', });
	$('#cookies').css('display', 'none');	
});

$('.close_popup').on('click', function(){
	$('#cookies').css('display', 'none');	
});
