<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-03
 * Time: 11:09
 */
function import($path) {
    $old_dir = getcwd();        // 保存原“参照目录”
    chdir(dirname(__FILE__));    // 将“参照目录”更改为当前脚本的绝对路径
    require_once($path);
    chdir($old_dir);            // 改回原“参照目录”
}
function getRelated($tag){
    import("../class/DB.php");
    $db = new DB();
    $sql = "SELECT * FROM `goods` WHERE tag = '{$tag}'";
    $res = $db->query($sql);
    if($res == false){
        echo "获取失败";
    }
    else{
        return $res;
    }
    return null;
}