<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-03
 * Time: 11:52
 */
//获取发布历史'

function getPostHistoryByUid($uid)
{
    $db = new DB();
    $sql = "SELECT * FROM `goods` WHERE owner_id = '{$uid}' ORDER BY post_time DESC limit 0,3";
    $res = $db->query($sql);
    if ($res == false) {
        echo "数据库连接失败";
        return null;
    } else {
        return $res;
    }
}

function getPostHistoryByGid($gid)
{
    $db = new DB();
    $sql = "SELECT * FROM `goods` WHERE owner_id = (SELECT owner_id FROM `goods` WHERE gid = {$gid} ) ";
    $res = $db->query($sql);
    if ($res == false) {
        echo "数据库连接失败";
        return null;
    } else {
        return $res;
    }
}