<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-07
 * Time: 13:23
 */
function getComments($gid)
{
    require_once("./class/DB.php");
    $db = new DB();
    $sql = "SELECT * FROM `comments`,`users` WHERE comments.gid = {$gid} AND comments.from_id = users.uid ORDER BY ctime DESC ";
    $res = $db->query($sql);
    if ($res == false) {
        return null;
    } else {
        return $res;
    }
}