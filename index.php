<?php

// require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
require __DIR__ . '/vendor/autoload.php';
error_reporting(0);
use Curl\Curl;
use juno_okyo\Chatfuel;

$chatfuel = new Chatfuel(TRUE);
$curl = new Curl();
function splitStr($str, $left, $right) {
	$str = explode($left, $str);
	$str = explode($right, $str[1]);
	return $str[0];
}
$curl->post("http://diemthi.laodong.vn/ajax/home/tra-cuu-12-2020", array(
	'sbd' => $_GET['sbd'],
	'cumthi' => '0'
));

// echo $curl->response->html;

$rs = $curl->response->html;
$rt['Toan'] = splitStr($rs, "<li>Toán: <strong>", "</strong></li>");
try {
	$rt['Li'] = splitStr($rs, "<li>Lý: <strong>", "</strong></li>");
	$rt['Hoa'] = splitStr($rs, "<li>Hóa: <strong>", "</strong></li>");
	$rt['Sinh'] = splitStr($rs, "<li>Sinh: <strong>", "</strong></li>");
} catch (Exception $e){
	echo($e);
	echo("Không có điểm tự nhiên");
}
try {
	$rt['Su'] = splitStr($rs, "<li>Sử: <strong>", "</strong></li>");
	$rt['Dia'] = splitStr($rs, "<li>Địa: <strong>", "</strong></li>");
	$rt['GDCD'] = splitStr($rs, "<li>GDCD: <strong>", "</strong></li>");
} catch (Exception $e){
	echo($e);
	echo("Không có điểm xã hội");
}
if (count($rt['Su']) > 0) {
	$tohop = 1;
} else {
	$tohop = 0;
}
$rt['Van'] = splitStr($rs, "<li>Văn: <strong>", "</strong></li>");
$rt['NN'] = splitStr($rs, "<li>Ngoại ngữ (N1): <strong>", "</strong></li>");

// echo json_encode($rt);
if ($tohop) {
	echo $chatfuel->sendText([
		"Toán: ".$rt['Toan'],
		"Văn: ".$rt['Van'],
		"Ngoại ngữ: ".$rt['NN'],
		"Sử: ".$rt['Su'],
		"Địa: ".$rt['Dia'],
		"GDCD: ".$rt['GDCD']
	]);
} else {
	echo $chatfuel->sendText([
		"Toán: ".$rt['Toan'],
		"Văn: ".$rt['Van'],
		"Ngoại ngữ: ".$rt['NN'],
		"Lí: ".$rt['Li'],
		"Hoá: ".$rt['Hoa'],
		"Sinh: ".$rt['Sinh']
	]);
}
