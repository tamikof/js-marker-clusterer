<?php
/**
 * Created by PhpStorm.
 * User: fujinotamiko
 * Date: 2017/10/30
 * Time: 16:44
 */

$page = 1;
$per = 100;
if (!empty($_GET['page'])) {
    $page = $_GET['page'];
}
$json = json_decode(file_get_contents( __DIR__ . '/sample.json'), true);
//$json = ['photos' => range(0,1000)];
$data = array_slice($json['photos'], ($page -1 ) * $per, $per);
$hasNext = true;
if ($page * $per >= count($json['photos'])) {
    $hasNext = false;
}
$from = ($page -1 ) * $per;
$to = $page * $per;
$count = count($json['photos']);
header('content-type: application/json; charset=utf-8');
echo json_encode(compact('data','hasNext','from','to','count'));
