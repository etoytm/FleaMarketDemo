<?php

var_dump($_POST);

$uid = $_POST['uid'];
$password = $_POST['password'];
$rpassword = $_POST['rpassword'];
$nick = $_POST['nick'];
if($nick == ''){
    $nick = $uid;
}

require_once ('../class/DB.php');
require_once ('../include/alert.php');
$db = new DB();

/*
 * 用户提交的信息预处理
 */

$sql = "INSERT INTO `users` (uid,password,nick,privilege) VALUES ('$uid','$password','$nick','0')";
echo $sql;
$res = $db->query($sql);
if($res){
    require_once ('../include/login_session.php');
    alt('注册成功，点击跳转到首页','../index.php');
}else{
    alt('注册失败，请检查信息','../signin.html');
}

