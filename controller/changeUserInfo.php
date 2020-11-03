<?php
require_once "../include/online.php";
offline_alert("请先登录！！");

$qq = $_POST['qq'];
$nick = $_POST['nick'];
$sex = $_POST['sex'];
$grade = $_POST['grade'];

$sql_change_user_info = "UPDATE `users` SET `qq` = '{$qq}',  `nick` = '{$nick}', `sex`='{$sex}', `grade`='{$grade}' WHERE `uid` = '{$_SESSION['uid']}';";
require_once "../class/DB.php";
$db = new DB();
require_once "../include/alert.php";
if ($db->query($sql_change_user_info))
    alt_back("修改成功！");
else
    alt_back("修改失败！");