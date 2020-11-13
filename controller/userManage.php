<?php
/**
 * 用户操作，包含注册用户、修改用户信息、获取用户信息等...
 */

function import($path)
{
    $old_dir = getcwd();        // 保存原“参照目录”
    chdir(dirname(__FILE__));    // 将“参照目录”更改为当前脚本的绝对路径
    require_once($path);
    chdir($old_dir);            // 改回原“参照目录”
}

import('../class/DB.php');

/**
 * 根据uid获取该用户全部信息
 * @param string $uid
 * @return array|null 包含有全部用户信息的array
 */
function getUserArrByUid($uid)
{
    $db = new DB();
    $sql_get = "SELECT * FROM `users` WHERE uid='{$uid}'";
    return $db->query($sql_get)->fetch_assoc();
}

/**
 * 根据uid获取该用户全部信息
 * @param string $uid
 * @return array|null 包含有全部用户信息的array
 */
function getUserArrByGid($gid)
{
    $db = new DB();
    $sql_get = "SELECT * FROM `users` WHERE uid=(SELECT owner_id FROM `goods` WHERE gid = {$gid})";
    return $db->query($sql_get)->fetch_assoc();
}

/**
 * 输出用户星级
 * @param $privilege
 * @param $id_identified
 */
function echoUserStarsByPrivilege($privilege, $id_identified)
{
    if ($id_identified == 0) {
        for ($i = 0; $i < 5; $i++)
            echo '<img style="margin-right:0px;" src="images/member_center/xx2.png">';
        echo '<b> 未认证</b>';
    } else {
        if ($privilege == 0)
            echoUserStarsByPrivilege(5, 1);
        else {
            for ($i = 0; $i < $privilege; $i++)
                echo '<img style="margin-right:0px;" src="images/member_center/star.png">';
            for ($i = 0; $i < 5 - $privilege; $i++)
                echo '<img style="margin-right:0px;" src="images/member_center/xx2.png">';
        }
    }
}
