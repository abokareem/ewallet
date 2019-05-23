<?php

	$currency_url = 'http://api.coinlayer.com/api/live?access_key=2662d865660f33044d955b13e1502011&target=USD';
	$content = file_get_contents($currency_url);
	$d = json_decode($content, true);
	echo $d['rates']['BTC'];
