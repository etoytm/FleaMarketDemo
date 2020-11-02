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

//    var_dump($res);
    if($res!= false){
        $step = 0;
        $start = $res;
        for($i=$start;$i<$d_len;$i++){
            $step++;
            if($description[$i] == '>'){
                break;
            }
//            echo $description[$i];

        }
        $src = substr($description,$start,$step);
        // 从img标签中提取路径
        $end = strpos($description,"title=");
        $src = substr($src,$start+7,$end - $start-12);
        return $src;
    }
    return '';
}

function FixPath($s){
    $len = strlen($s);
    for($i =0;$i<$len;$i++){

        if($s[$i] == 's' && $s[$i+1] == 'r' && $s[$i+2] == 'c' && $s[$i+3] == '='){

            $s = substr_replace($s,"." ,$i+5,0);
            $len++;

        }
    }
    return $s;
}
$tag = $_POST['tag'];
$price_now = $_POST['price_now'];
$price_old = $_POST['price_old'];
$title = $_POST['title'];

$description = $_POST['description'];
// 路径修正
$description = FixPath($description);

//preg_match('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i',$description,$match);

preg_match_all('/(?<=src=)\S+/',$description,$match);

//首张图片
$preview  = $match[0][0];

$owner_id = $_SESSION['uid'];
if($preview == ''){
    $preview = "./images/NoPreview.png";
}
//描述中，文字与图片分离
$description= preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', '', $description);

require_once ("../controller/goodsManage.php");

$good  = new Goods(-1, $title, $price_now, $price_old, $description, $preview,1,1,$tag,$owner_id);
$res  = addGoods($good);
require_once ("../include/alert.php");
if($res == true){
    alt_back('发布成功');
}else{
    alt_back("发布失败");
}

