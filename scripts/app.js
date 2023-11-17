$('.define').on('click', function(){
	let phone = $('.phone').val();;
	$.post('Handler.php', {
	  	phone : phone
	}).done(function(data) {
	    alert(data);
  	});
});
