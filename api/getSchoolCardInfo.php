s<?php
$arr = array(
    'status' => null,
    'uploadInfo' => null,
    'isTrueCard' => null,
    'cardNumber' => null
);


//检测登录状态
if (!isset($_COOKIE['uid'])) {
    $arr['status'] = 'notLogin';
    die(json_encode($arr));
}
$arr['status'] = 'isLogin';


$filepath = null;

if (!isset($_FILES['face'])) {
    $arr['uploadInfo'] = 'upload is empty!';
    die(json_encode($arr));
} else if ($_FILES['face']['error'] === 0) {  //上传正确
    $path = '../upload/card/';
    if (!file_exists($path)) {//创建文件夹
        mkdir(iconv("UTF-8", "GBK", $path), 0777, true);
    }
    $fileName = $_FILES['face']['name'];
    $type = strtolower(substr($fileName, strrpos($fileName, '.') + 1)); //得到文件类型，并且都转化成小写
    $allow_type = array('jpg', 'jpeg', 'gif', 'png'); //定义允许上传的类型
//        //判断文件类型是否被允许上传
    if (!in_array($type, $allow_type)) {
        $arr['uploadInfo'] = 'File type error!';
        die(json_encode($arr));
    }
    //文件的路径
    $final_path = $path . $fileName;
    //文件移动到指定目录
    move_uploaded_file($_FILES['face']['tmp_name'], $final_path);
    // 重命名文件名为uid.png
    $filepath = $path . $_SESSION['uid'] . '.png';
    rename($final_path, $filepath);
    $arr['uploadInfo'] = 'success';
} else {
    $arr['uploadInfo'] = 'Upload error code:' . $_FILES['face']['error'];
    die(json_encode($arr));
}

require_once('../include/aipocr.php');
require_once('../include/ocr/AipOcr.php');

$res = isTrueCard($filepath);
if (!$res)
    $arr['isTrueCard'] = false;
else {
    $arr['isTrueCard'] = true;
    $arr['cardNumber'] = $res;
}

//清空输出缓冲区, 保证只返回json数据
ob_clean();

die(json_encode($arr));