<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-27
 * Time: 18:55
 */
//require_once ('./ocr/AipOcr.php');
const APP_ID = '2d7f005abb434e76a18582bf4afd8089';
const API_KEY = '321719fedf3f41cfb714ed7b82708447';
const SECRET_KEY = '317a300156ff4acd9b91ff710361efc6';


//// 调用通用文字识别（高精度版）
//$client->basicAccurate($image);
//// 如果有可选参数
//$options = array();
//$options["detect_direction"] = "true";
//$options["probability"] = "true";
//
//// 带参数调用通用文字识别（高精度版）
//var_dump($client->basicAccurate($image, $options));

/**
 * @param string $imgpath
 * @return bool|mixed 如果认证成功则返回校园卡号，否则返回false
 */
function isTrueCard($imgpath)
{
    $image = file_get_contents($imgpath);
    $client = new AipOcr(APP_ID, API_KEY, SECRET_KEY);

    //调用通用文字识别, 图片参数为本地图片
    $client->basicGeneral($image);

    // 如果有可选参数
    $options = array();
    $options["language_type"] = "CHN_ENG";
    $options["detect_direction"] = "true";
    $options["detect_language"] = "true";
    $options["probability"] = "true";

    // 带参数调用通用文字识别, 图片参数为本地图片
    $res = $client->basicGeneral($image, $options);

    $res = $res['words_result'];
    $cardInfo = '';
    foreach ($res as $r) {
        $cardInfo = $cardInfo . $r['words'];
        echo $r['words'];
    }
    if (strpos($cardInfo, '学院') && strpos($cardInfo, '烟台')) {
        $t = null;
        preg_match('/[0-9]{16}/', $cardInfo, $t);
        $t = substr($t[0], 4);
        return $t;
    }
    return false;
}


