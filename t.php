<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-27
 * Time: 19:10
 */



$s = "<p><img src=\"/ueditor/php/upload/image/20201101/1604202204684447.png\" title=\"1604202204684447.png\"/></p><p><br/><img src=\"/ueditor/php/upload/image/20201101/1604202204684447.png\" title=\"1604202204684447.png\"/></p>";
function getImgs($s){
    $len = strlen($s);
    $start = 0;
    $step = 0;
    $res = [];
    for($i =0;$i<$len;$i++){

        if($s[$i] == '<' && $s[$i+1] == 'i' && $s[$i+2] == 'm' && $s[$i+3] == 'g'){
            $start = $i;
            while ($s[++$i] != '>' && $i<$len){
                $step++;
            }
            echo substr($s,$start,$step+2);
            $ipath = substr($s,$start,$step+2);
            $ipath = substr_replace($ipath," class=\"description_img\" " ,5,0);
            $res[] = $ipath;
            $step = 0;
        }
    }
    return $res;
}
//$res = [];
////$res = getImgs($s);
////var_dump($res);
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
echo FixPath($s);