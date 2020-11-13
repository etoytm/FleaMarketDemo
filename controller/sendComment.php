<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-07
 * Time: 13:13
 */
require_once("../include/time.php");
session_start();
//get 有 gid，ctype
$gid = $_GET['gid'];
$ctype = $_GET['ctype'];

$from_id = $_SESSION['uid'];

$to_id = $_POST['to_id'];
$text = $_POST['text'];
require_once("../include/alert.php");

if ($text == null) {
    alt_back("评论内容不可为空");
}

$ctime = getTime();

require_once("../class/DB.php");
$db = new DB();
$sql = "INSERT INTO `comments` (from_id,to_id,text,gid,ctime,ctype) VALUES ('{$from_id}','{$to_id}','{$text}',{$gid},'{$ctime}','{$ctype}')";
$res = $db->query($sql);
if ($res == false) {
    echo "数据库连接失败";
    return null;
} else {
    back();
}