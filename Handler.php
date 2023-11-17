<?php

	const URL = 'https://cdn.jsdelivr.net/gh/andr-04/inputmask-multi@master/data/phone-codes.json';

	function getJson(){
		$data = file_get_contents(URL);
		$json = json_decode($data);
		
		return $json;
		// $masks = array();

		// foreach ($json as $val) {
		// 	array_push($masks, $val->mask);
		// }
		// return $masks;
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
				echo 'Preg: ' . implode(' | ', preg_grep($reg, $arr));

				if(substr($phone, 0, strlen($mask)) == $mask){
					echo "Equals " . $val->name_ru . '; sub: ' . substr($phone, 0, strlen($mask)) . '; mask: ' . $mask;
					break;
				}
				// if(str_contains($phone, $mask)){
				// 	echo "got it " . $val->name_ru;
				// 	die();
				// }else{
				// 	echo "nope";
				// }
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