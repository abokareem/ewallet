<?php
// https://www.php.net/manual/ru/class.memcached.php
// Memcached - это высокопроизводительная и распределенная система кеширования любых объектов в памяти, предназначенная в первую очередь для ускорения динамических веб-приложений за счет снижения нагрузки на базу данных.
// $m = new Memcached();
// $m->addServer('localhost', 11211);
// if (($data = $m->get('someKey')) === false) {
// do some actions do get data from remote source
	// place your code here, store result in $data variable
	$currency_url = 'http://api.coinlayer.com/api/live?access_key=2662d865660f33044d955b13e1502011&target=USD';

	// $currency_url = 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5';
	$content = file_get_contents($currency_url);
	$d = json_decode($content, true);
	// foreach ($d as $c) {
	// 	if ($c['ccy'] == "USD") {
	// 		$uC = $c["sale"];
	// 	}
	// }
	// $m->set('someKey', json_encode($uC), 60 * 60 * 2); // срок действия 2 часа
	// $m->set('someKey', json_encode($d), 60 * 60 * 2); // срок действия 2 часа
// }
echo json_encode($d['rates']['BTC']);
// echo $d['rates']['BTC'];
// echo $m->get('someKey');

/*
самый простой вариант, оздать файл, в первой строке указать время когда он станет не актуальным, обратись к банку, забрали курсы, записали.

При следующем обращении чекаете файлик, в нем проверяете актуальность времени, если время вышло, обращаетесь к сайту и перезаписываете файлик. Если время не вышло, то забираете информацию из него.

Примерно так, в целом можно найти какую нибудь библиотечку с кешером легковесную и юзать ее
 */

/*$now = date();
$filename = __FILE__;
if (file_exists($filename)) {
// echo "В последний раз файл $filename был изменен: " . date("F d Y H:i:s.", filemtime($filename));
date("", filemtime($filename));
}
 */