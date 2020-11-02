<?php
session_start();
$uid = $_SESSION['uid'];
$password_old = $_POST['passwd_old'];
$password_new = $_POST['passwd_new'];

$sql_check = "SELECT uid FROM `users` WHERE `password`='{$password_old}' AND uid='{$uid}'";
require_once '../class/DB.php';
$db = new DB();
$res = $db->query($sql_check);
require_once '../include/alert.php';
//密码输入正确
if ($res->num_rows == 1) {
    $sql_change = "UPDATE `users` SET `password` = '{$password_new}' WHERE `uid` = 'admin'";
    if ($db->query($sql_change)) {
        echo "<script>if(confirm('密码已修改，请重新登录！')) location.href='../login.html'</script>";
        require_once "../include/logout_session.php";
    } else {
        alt_back("密码修改失败！");
    }
} else {//密码输入错误
    alt_back("旧密码输入错误！");
}


