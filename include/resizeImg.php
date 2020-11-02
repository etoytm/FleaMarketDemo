<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-02
 * Time: 20:45
 */
$imgsrc = "http://www.nowamagic.net/images/3.jpg";
$width =
    780;
$height = 420;
resizejpg($imgsrc,$imgdst,$width,$height);
function resizejpg($imgsrc,$imgdst,$imgwidth,$imgheight)
{
//$imgsrc
    jpg格式图像路径 $imgdst jpg格式图像保bai存文件名du $imgwidth要改变的宽度 $imgheight要改变的高度
//取得图片的zhi宽度,高度值dao
$arr = getimagesize($imgsrc);
header("Content-type:
image/jpg");
$imgWidth = $imgwidth;
$imgHeight = $imgheight;
//
Create image and define colors
$imgsrc = imagecreatefromjpeg($imgsrc);
$image = imagecreatetruecolor($imgWidth, $imgHeight); //创建一个彩色的底图
imagecopyresampled($image, $imgsrc, 0, 0, 0, 0,$imgWidth,$imgHeight,$arr[0],
    $arr[1]);
imagepng($image);
imagedestroy($image);
}