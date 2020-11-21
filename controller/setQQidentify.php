<?php
session_start();
$uid = $_SESSION['uid'];
$qq = $_GET['qq'];
require_once ("../class/DB.php");
$db = new DB();
$sql = "UPDATE `users` SET qq_identify = '1',qq = '{$qq}' WHERE uid = '{$uid}' ";
$res = $db->query($sql);
if($res){
    $_SESSION['qq_identify'] = '1';
}
else{
    $_SESSION['qq_identify'] = '0';
}