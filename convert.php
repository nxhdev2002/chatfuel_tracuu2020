<?php

require __DIR__ . '/vendor/autoload.php';
// error_reporting(0);
use Curl\Curl;
use juno_okyo\Chatfuel;

$chatfuel = new Chatfuel(TRUE);

$mode = $_GET['current_mode'];
$content = $_GET['content'];
$rt = array();
switch ($mode) {
    case 'bin':
        if (strpos($content, '1') || strpos($content, '0')) {
            $rs = array('dec' => base_convert($content, 2, 10), 'hex' => base_convert($content, 2, 16), 'oct' => base_convert($content, 2, 8));
        } else {
            $chatfuel->sendText("binary chỉ có 0 với 1 thôi :)");
            die();
        }
        break;
    case 'dec':
        $rs = array('bin' => base_convert($content, 10, 2), 'hex' => base_convert($content, 10, 16), 'oct' => base_convert($content, 10, 8));
        break;
    case 'hex':
        $rs = array('bin' => base_convert($content, 16, 2), 'dec' => base_convert($content, 16, 10), 'oct' => base_convert($content, 16, 8));
        break;
    default:
        $rs = array('bin' => base_convert($content, 8, 2), 'dec' => base_convert($content, 8, 10), 'hex' => base_convert($content, 8, 16));
        break;
}

$rt = $rt + $rs;
// var_dump($rt);
foreach ($rt as $key => $value) {
    $chatfuel->sendText($key.": ".$value);
}