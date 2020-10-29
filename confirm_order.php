<?php
session_start();
require_once('./include/online.php');
//offline_alert();

//$gid = 6;
//$gid = $_POST['gid'];
$gid = $_GET['gid'];
require_once 'class/DB.php';
require_once 'controller/goodsManage.php';
require_once 'include/alert.php';
$db = new DB();
$re = $db->query("SELECT * FROM `goods` WHERE gid={$gid};");
$goods = getGoodsInstanceByArr($re->fetch_assoc());

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>确认订单</title>
</head>
<body>
<div style="position: absolute;left: 30%">
    <img src="<?php echo $goods->getPreview() ?>" style="width: 500px;height: 315px">
    <div><?php echo $goods->getName() ?></div>
    <div><?php echo $goods->getDescription() ?></div>
    <div>价格：<?php echo $goods->getPriceNow() ?></div>
    <div>
        <button onclick="location.href='https://www.baidu.com/'">联系商品发布者</button>
        <button onclick="location.href='https://www.baidu.com/'">立即支付！</button>
    </div>
</div>
</body>
</html>