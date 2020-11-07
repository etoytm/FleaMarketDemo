<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-27
 * Time: 19:25
 */
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-08-02
 * Time: 19:53
 */
header("Content-type:text/html;charset=utf-8");

session_start();
$res = upload_image();
if (is_bool($res)) {
    //是布尔值，上传失败
    return false;
} else if (is_string($res)) {
    identify($res);
}
function identify($imgpath)
{
    require_once('../include/alert.php');
    require_once('../include/aipocr.php');
    require_once('../include/ocr/AipOcr.php');
    $res = isTrueCard($imgpath);
    if ($res) {
        require_once('../class/DB.php');
        $db = new DB();
        $db->query("UPDATE `users` SET uid_identify = '1', school_number = '{$res}' WHERE uid = '{$_SESSION['uid']}' ");
        alt_back('身份认证成功！请刷新此页面！');
    } else {
        alt_back('身份认证失败，请确保校园卡照片清晰，无污损!');
    }

//    require_once ('../include/ocr/AipOcr.php');
//    const APP_ID = '2d7f005abb434e76a18582bf4afd8089';
//    const API_KEY = '321719fedf3f41cfb714ed7b82708447';
//    const SECRET_KEY = '317a300156ff4acd9b91ff710361efc6';
//
//    $client = new AipOcr(APP_ID, API_KEY, SECRET_KEY);
//    $image = file_get_contents('t.jpg');
//
//
////// 调用通用文字识别（高精度版）
////$client->basicAccurate($image);
////// 如果有可选参数
////$options = array();
////$options["detect_direction"] = "true";
////$options["probability"] = "true";
////
////// 带参数调用通用文字识别（高精度版）
////var_dump($client->basicAccurate($image, $options));
//
//    //调用通用文字识别, 图片参数为本地图片
//    $client->basicGeneral($image);
//
//// 如果有可选参数
//    $options = array();
//    $options["language_type"] = "CHN_ENG";
//    $options["detect_direction"] = "true";
//    $options["detect_language"] = "true";
//    $options["probability"] = "true";
//
//// 带参数调用通用文字识别, 图片参数为本地图片
////    var_dump($client->basicGeneral($image, $options));
//    $res = $client->basicGeneral($image, $options);
//    $res = $res['word_result'];
//
//    foreach ($res as $r){
//        echo $r['words'];
////    }
}

function upload_image()
{
    if ($_FILES['face']['error'] == 0) {  //上传正确
        //文件上传
        $path = '../upload/card/';

        if (!file_exists($path)) {//创建文件夹
            mkdir(iconv("UTF-8", "GBK", $path), 0777, true);
        }
//        var_dump($_FILES);
        $fileName = $_FILES['face']['name'];
        $type = strtolower(substr($fileName, strrpos($fileName, '.') + 1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg', 'jpeg', 'gif', 'png'); //定义允许上传的类型
//        //判断文件类型是否被允许上传
        if (!in_array($type, $allow_type)) {
//            //如果不被允许，则直接停止程序运行
            echo "<script>alert('只允许上传JPG，JPEG，gif，png格式的图片');history.go(-1);</script>";
            return false;
        }
        //文件的路径
        $final_path = $path . $fileName;
        //文件移动到指定目录
        move_uploaded_file($_FILES['face']['tmp_name'], $final_path);
        // 重命名文件名为uid.png
        $newpath = $path . $_SESSION['uid'] . '.png';
        rename($final_path, $newpath);
        return $newpath;

//        $uploade_time = date('Y-m-d H:i:s', time());

    } else {
        echo "<script>alert('上传失败');history.go(-1);</script>";
        switch ($_FILES['face']['error']) {
            case 1:
                echo "<script>alert('文件过大');history.go(-1);</script>";
                break;
            case 2:
                echo "<script>alert('文件过大');history.go(-1);</script>";
                break;
            case 3:
                echo "<script>alert('文件只有部分被上传');history.go(-1);</script>";
                break;
            case 4:
                echo "<script>alert('没有文件被上传');history.go(-1);</script>";
                break;
            default:
                echo "<script>alert('出现错误');history.go(-1);</script>";
        }
        return false;

    }
}

function make_dir($dir)
{
    if (!is_dir(dirname($dir))) {
        make_dir(dirname($dir));
    }
    return mkdir($dir);
}
