<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-29
 * Time: 17:21
 */
function getImgSrc($description){
    $flag = '<img';
    $flag_len = strlen($flag);
    $d_len = strlen($description);
    $res = strpos($description,$flag);

    var_dump($res);
    if($res!= false){
        $step = 0;
        $start = $res;
        for($i=$start;$i<$d_len;$i++){
            $step++;
            if($description[$i] == '>'){
                break;
            }
            echo $description[$i];

        }
        $src = substr($description,$start,$step);
        echo $src.'1';
        return $src;
    }
    return '';
}

$tag = $_POST['tag'];
$price_now = $_POST['price_now'];
$price_old = $_POST['price_old'];
$title = $_POST['title'];
$description = $_POST['description'];
$preview  = getImgSrc($description);

require_once ("../controller/goodsManage.php");

$good  = new Goods(-1, $title, $price_now, $price_old, $description, $preview,1,1,$tag);
$res  = addGoods($good);
require_once ("../include/alert.php");
if($res == true){
    alt_back('发布成功');
}else{
    alt_back($res);
}

