<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-29
 * Time: 17:21
 */
$tag = $_POST['tag'];
$price_now = $_POST['price_now'];
$price_old = $_POST['price_old'];
$title = $_POST['title'];
$description = $_POST['description'];
require_once ("../class/Goods.php");
require_once ("../controller/goodsManage.php");
$good  = new Goods($title,$price_now,$price_old,$description,$tag);


