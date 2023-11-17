<?php
	if(!isset($_COOKIE['dont_touch_my_cookies'])) 
	{	
		$cookieHtml = "<div id='cookies' class=\"text-center p-3 w-25\">
							<p>Сайт использует куки</p>
							<a class='cookieLinks accept_cookie' href=#>Принять</a>
							<a class='cookieLinks close_popup' href=#>Закрыть</a>
						</div>";
		echo $cookieHtml;
	}

?>