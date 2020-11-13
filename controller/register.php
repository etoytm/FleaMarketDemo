<?php
$arr = array(
    "nameRepetition" => null,
    "regSuccess" => null,
    "username" => null,
    "password" => null
);

require_once '../class/DB.php';
$db = new DB();

//名字重复
$sql = "SELECT uid FROM `users` WHERE `uid` = '{$_POST['uid']}';";
$re = $db->query($sql);
if ($re->num_rows == 1) {
    $arr['nameRepetition'] = true;
    die(json_encode($arr));
}


$sql = "INSERT INTO `users` (uid,password,privilege) VALUES ('{$_POST['uid']}','{$_POST['password']}','0')";
$re = $db->query($sql);
if ($re) {
    $arr['regSuccess'] = true;
    $arr['username'] = $_POST['uid'];
    $arr['password'] = $_POST['password'];
} else {
    $arr['regSuccess'] = false;
}
die(json_encode($arr));