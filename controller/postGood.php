<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-29
 * Time: 17:21
 */
function getImgSrc($description)
{
    $flag = '<img';
    $flag_len = strlen($flag);
    $d_len = strlen($description);
    $res = strpos($description, $flag);

//    var_dump($res);
    if ($res != false) {
        $step = 0;
        $start = $res;
        for ($i = $start; $i < $d_len; $i++) {
            $step++;
            if ($description[$i] == '>') {
                break;
            }
//            echo $description[$i];

        }
        $src = substr($description, $start, $step);
        // 从img标签中提取路径
        $end = strpos($description, "title=");
        $src = substr($src, $start + 7, $end - $start - 12);
        return $src;
    }
    return '';
}

function FixPath($s)
{
    $len = strlen($s);
    for ($i = 0; $i < $len; $i++) {

        if ($s[$i] == 's' && $s[$i + 1] == 'r' && $s[$i + 2] == 'c' && $s[$i + 3] == '=') {

            $s = substr_replace($s, ".", $i + 5, 0);
            $len++;

        }
    }
    return $s;
}

$tag = $_POST['tag'];
$type = $_POST['type'] == "on" ? '1' : '2';
$price_now = $_POST['price_now'];
$price_old = $_POST['price_old'];
$title = $_POST['title'];
$xyk = $_POST['xyk'] == 'on';

$description = $_POST['description'];
// 路径修正
$description = FixPath($description);

//preg_match('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i',$description,$match);

preg_match_all('/(?<=src=)\S+/', $description, $match);

//首张图片
$preview = $match[0][0];
$preview1 = "." . explode('"', $preview)[1];

session_start();
require_once("../controller/goodsManage.php");
require_once("../include/alert.php");
$owner_id = $_SESSION['uid'];

if ($xyk) {
    require_once('../include/ocr/AipOcr.php');
    require_once('../include/aipocr.php');
    if ($card_num = isTrueCard($preview1)) {
        import("../class/DB.php");
        $sql = "SELECT qq FROM `users` WHERE `school_number` = '{$card_num}'";
        $db = new DB();
        $re = $db->query($sql);
        if ($re->num_rows == 1) {
            $t = $re->fetch_assoc()['qq'];
            require_once '../include/email_utils.php';
            $re = sendEmail($t."@qq.com",
                "YTU跳蚤市场",
                "您的信用卡已经找回！"
            );
            if ($re) {
                alt("检测到该同学注册过FM账号，已将找回信息发送至该同学QQ邮箱", "../index.php");
            }
        } else {
            $title = "失物招领";
            $price_now = 0;
            alt("未检测到该同学注册过FM账号，将会将失物招领信息发布至首页！");
        }

    }
}


if ($preview == '') {
    $preview = "\"./images/NoPreview.png\"";
}
//描述中，文字与图片分离
$description = preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', '', $description);
//只提取出文本
$description = getplaintextintrofromhtml($description);
$good = new Goods(-1, $title, $price_now, $price_old, $description, $preview, 1, $type, $tag, $owner_id);
$res = addGoods($good);
if ($res == true) {
    alt_back('发布成功');
} else {
    alt_back("发布失败");
}

function getplaintextintrofromhtml($html)
{

    // Remove the HTML tags
    $html = strip_tags($html);

    // Convert HTML entities to single characters
    $html = html_entity_decode($html, ENT_QUOTES, 'UTF-8');
    $html_len = mb_strlen($html, 'UTF-8');

    // Make the string the desired number of characters
    // Note that substr is not good as it counts by bytes and not characters
    $html = mb_substr($html, 0, strlen($html), 'UTF-8');

    return $html;
}
