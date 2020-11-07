<?php
require_once "../include/online.php";
offline_alert("请先登录！！");

$qq = $_POST['qq'];
$nick = $_POST['nick'];
$sex = $_POST['sex'];
$grade = $_POST['grade'];
$t_path = $_FILES['head']['tmp_name'];
$des_path = '../images/member_center/' . $_SESSION['uid'] . '.jpg';
move_uploaded_file($t_path, $des_path);

$real_path = explode('../', $des_path)[1];
$sql_change_user_info = "UPDATE `users` SET `qq` = '{$qq}',  `nick` = '{$nick}', `sex`='{$sex}', `grade`='{$grade}', `head`='{$real_path}' WHERE `uid` = '{$_SESSION['uid']}';";
require_once "../class/DB.php";
$db = new DB();
require_once "../include/alert.php";
if ($db->query($sql_change_user_info))
    alt_back("修改成功！请刷新此页面！");
else
    alt_back("修改失败！");