<?php

require_once ("../include/alert.php");

$uid = $_POST['uid'];
if(!is_numeric($uid)){
    alt_back("请输入合法的学号");
    die();
}

$password = $_POST['password'];
if($password == null){
    alt_back("密码不可为空");
    die();

}
$rpassword = $_POST['rpassword'];
if($rpassword != $password){
    alt_back("两次密码不一致");
    die();

}
$nick = $_POST['nick'];
if($nick == null){
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

