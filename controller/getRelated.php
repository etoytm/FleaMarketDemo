<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-03
 * Time: 11:09
 */


function getRelated($tag)
{
    $db = new DB();
    $sql = "SELECT * FROM `goods` WHERE tag = '{$tag}'";
    $res = $db->query($sql);
    if ($res == false) {
        echo "获取失败";
    } else {
        return $res;
    }
    return null;
}