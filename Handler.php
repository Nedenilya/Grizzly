<?php

	const URL = 'https://cdn.jsdelivr.net/gh/andr-04/inputmask-multi@master/data/phone-codes.json';

	function getJson(){
		$data = file_get_contents(URL);
		$json = json_decode($data);
		
		return $json;
	}

	if(isset($_POST['phone'])){
		$json = getJson();	
		$phone = str_replace(' ', '', $_POST['phone']);
		$phone = str_replace('+', '', $phone);
		$phone = str_replace('-', '', $phone);
		$phone = str_replace('(', '', $phone);
		$phone = str_replace(')', '', $phone);

		foreach($json as $val){
			$mask = str_replace('-', '', $val->mask);
			$mask = str_replace('(', '', $mask);
			$mask = str_replace(')', '', $mask);
			$mask = str_replace('+', '', $mask);

			if(strlen($mask) == strlen($phone)){
				$mask = str_replace('#', '', $mask);
				$reg = '/\([0-9]{1,3}\)/';
				$arr = array($mask);
				// echo 'Preg: ' . implode(' | ', preg_grep($reg, $arr));

				if(substr($phone, 0, strlen($mask)) == $mask){
					echo "Country: " . $val->name_ru . '; Mask: ' . $val->mask;//substr($phone, 0, strlen($mask));
					break;
				}
			}
		}	
	}







				// //make chars array from mask
				// $maskChars = str_split($mask);

				// //generating target regex
				// $outputRegex = "/^";
				// foreach ($maskChars as $char) {
				// 	if($char == '#')
				//     	$outputRegex .= "[0-9]";
				//     else
				//     	$outputRegex .= $char;
				// }
				// $outputRegex .= "/";

				// if(preg_match($outputRegex, $phone)){
				// 	// echo $outputRegex .'; ' . $phone . ';|';
				// 	echo 'Equal' . $val->name_ru;
				// }