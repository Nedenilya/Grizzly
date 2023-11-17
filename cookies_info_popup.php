<?php
		if(!isset($_COOKIE['infoCookies'])) 
		{	
			$cookieHtml = "<div id='cookies'>
								Сайт использует куки
								<a class='cookieLinks' target='_blank' href='#'>Информация</a>
								).
								<a onClick='hideCookie();' class='cookieLinks' href=#>Принять</a>
								<a onClick='close();' class='cookieClose' href=#>Закрыть</a>
							</div>";
			echo $cookieHtml;
		}
	
	?>
<script type=text/javascript>
	function close(){
		document.getElementById("cookies").style.display = "none";	
	}
	
	function hideCookie(){
		var CookieDate = new Date;
		CookieDate.setFullYear(CookieDate.getFullYear( ) +1);
		document.cookie = 'infoCookies=true; expires=' + CookieDate.toGMTString( ) + ';';

		document.getElementById("cookies").style.display = "none";		
	}
</script>