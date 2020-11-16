<?php
session_start();
$arr = array(
    "loginSuccess" => null
);

$sql = "SELECT uid FROM `users` WHERE `uid` = '{$_POST['uid']}' AND `password` = '{$_POST['password']}';";

require_once '../class/DB.php';

$db = new DB();
$re = $db->query($sql);

if ($re->num_rows == 1) {
    $arr['loginSuccess'] = true;
    $_SESSION['uid'] = $_POST['uid'];
    setcookie('uid', $_POST['uid'], time() + 60 * 60, '/');
}

die(json_encode($arr));