<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-21
 * Time: 14:01
 */
header("Content-type:text/html;charset=utf-8");
$uid = $_POST['uid'];
$password = $_POST['password'];
var_dump($uid);
var_dump($password);
require_once ("../class/DB.php");
require_once ('../include/alert.php');
$res = check_login($uid,$password);
var_dump($res);

if(gettype($res)=='array'){

    require_once ('../include/login_session.php');
    header("location:../index.php");
//    header('location:../index.php');
}else{
    alt('用户名或密码错误','../login.html');

//    back();
}
function check_login($uid,$password){
    $db = new DB();
    $res = $db->query("SELECT * FROM `users` WHERE uid = '{$uid}' AND password = '{$password}'");
    $cnt = mysqli_num_rows($res);

    if($cnt==1){
        $row = $res->fetch_array(MYSQLI_ASSOC);
        return $row;
    }
    return false;
}
