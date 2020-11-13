<?php
$arr = array(
    "nameRepetition" => null,
    "passwordError" => null,
    "loginSuccess" => null
);

$sql = "SELECT uid FROM `users` WHERE `uid` = '{$_POST['uid']}' AND `password` = '{$_POST['password']}';";

require_once '../class/DB.php';

$db = new DB();
$re = $db->query($sql);

if ($re->num_rows == 1)
    $arr['loginSuccess'] = true;

die(json_encode($arr));