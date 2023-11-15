$('.define').on('click', function(){
	let phone = $('.phone').val();
	$.post('Handler.php', function() {
	  	phone: phone
	}).done(function() {
	    alert("success");
  	});
});