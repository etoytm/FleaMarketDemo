<?php
require "include/checkLogin.php";
$arr = array(
    'info' => null
);

$uid = $_POST['uid'];
require_once '../class/DB.php';
$db = new DB();
$sql_get = "SELECT * FROM `users` WHERE uid='{$uid}'";
$arr['info'] = $db->query($sql_get)->fetch_assoc();

die(json_encode($arr));