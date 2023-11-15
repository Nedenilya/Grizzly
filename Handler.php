<?php

	$data = file_get_contents('https://cdn.jsdelivr.net/gh/andr-04/inputmask-multi@master/data/phone-codes.json');
	$json = json_decode($data);

