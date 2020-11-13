<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-27
 * Time: 19:10
 */


$str = "<p>正能量，万人称我美食家znb<img src=\"/ueditor/php/upload/image/20201101/1604202204684447.png\" title=\"1604202204684447.png\"/></p><p><br/><img src=\"/ueditor/php/upload/image/20201101/1604202204684447.png\" title=\"1604202204684447.png\"/></p>";
function getImgs($s)
{
    $len = strlen($s);
    $start = 0;
    $step = 0;
    $res = [];
    for ($i = 0; $i < $len; $i++) {

        if ($s[$i] == '<' && $s[$i + 1] == 'i' && $s[$i + 2] == 'm' && $s[$i + 3] == 'g') {
            $start = $i;
            while ($s[++$i] != '>' && $i < $len) {
                $step++;
            }
            echo substr($s, $start, $step + 2);
            $ipath = substr($s, $start, $step + 2);
            $ipath = substr_replace($ipath, " class=\"description_img\" ", 5, 0);
            $res[] = $ipath;
            $step = 0;
        }
    }
    return $res;
}

//$res = [];
////$res = getImgs($s);
////var_dump($res);
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

$s = "<p>正能量</p><a href='ddd'>niup</a>";
echo getplaintextintrofromhtml($s);

//preg_match('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i',$str,$match);
//echo $match[0];
//preg_match_all('/(?<=src=)\S+/',$str,$m);
//var_dump($m);
//echo  $m[1];
//print_r($m[0]);


//$str= preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', '', $str);
//
//echo $str;

