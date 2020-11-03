<?php
/**
 * 用户操作，包含注册用户、修改用户信息、获取用户信息等...
 */

/**
 * 根据uid获取该用户全部信息
 * @param string $uid
 * @return array|null 包含有全部用户信息的array
 */
function getUserArrByUid($uid)
{
    require_once "../class/DB.php";
    $db = new DB();
    $sql_get = "SELECT * FROM `users` WHERE uid='{$uid}'";
    return $db->query($sql_get)->fetch_assoc();
}