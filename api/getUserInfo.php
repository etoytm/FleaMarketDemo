<?php
$arr = array(
    'status' => null,
    'info' => null
);

//检测登录状态
if (!isset($_COOKIE['uid'])) {
    $arr['status'] = 'notLogin';
    die(json_encode($arr));
}
$arr['status'] = 'isLogin';

$uid = $_POST['uid'];
require_once '../class/DB.php';
$db = new DB();
$sql_get = "SELECT * FROM `users` WHERE uid='{$uid}'";
$arr['info'] = $db->query($sql_get)->fetch_assoc();

die(json_encode($arr));