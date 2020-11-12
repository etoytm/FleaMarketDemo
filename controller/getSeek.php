<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-06
 * Time: 13:06
 */


function getSeek($keyword){
    if($keyword == null){
        return null;
    }
    import("../class/DB.php");
    $db = new DB();
    //全表查找子串
    $sql = "SELECT * FROM `goods` WHERE description LIKE '%{$keyword}%' OR name LIKE '%{$keyword}%' OR tag LIKE '%{$keyword}%' ";
    $res = $db->query($sql);
    if($res == false){
        return "无法链接到数据库";
    }
    else{
        return $res;
    }
}