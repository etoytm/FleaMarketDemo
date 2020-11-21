<?php
require_once ("../include/email_utils.php");
$qq = trim($_GET['qq'])."@qq.com";
$vcode = $_GET['vcode'];

$title = "FleaMarket验证码";
$content = "您的验证码为".$vcode;
$res = sendEmail($qq,$title,$content);
require_once ("../include/alert.php");
session_start();
if($res){
    $_SESSION['vode'] = $vcode;
    alt("发送成功");
}else{
    alt("发送失败");
}