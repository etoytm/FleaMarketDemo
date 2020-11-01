<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-01
 * Time: 10:47
 */
$gid = $_GET['gid'];
//$gid = 27;
require_once("./class/DB.php");
$db = new DB();
$sql = "SELECT * FROM `goods` WHERE  gid = {$gid} ;";
$res = $db->query($sql);
//var_dump($res);

$res = $res->fetch_array(MYSQLI_ASSOC);
//var_dump($res);
$gid = $res['gid'];

$owner_id = $res['$owner_id'];
$owner_info = getOwner($owner_id);
$qq = $owner_info['qq'];


$name = $res['name'];
$price_now = $res['price_now'];
$price_old = $res['price_old'];
$description = $res['description'];
$preview = $res['preview'];
$type = $res['type'];
$tag = $res['tag'];
$imgs = [];
$imgs = getImgs($description);


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
//            echo substr($s,$start,$step+2);
            $ipath = substr($s,$start,$step+2);
            $ipath = substr_replace($ipath," width=\"400\" height=\"550\" " ,5,0);
//            die($ipath);
            $res[] = $ipath;
            $step = 0;
        }
    }
    return $res;
}
function getOwner($uid){
    $db = new DB();
    $res = $db->query("SELECT * FROM `users` WHERE uid = '{$uid}'");
    if($res == false){
        require_once ("../include/alert.php");
        alt_back("该货主不存");
    }
    else{
        return $res->fetch_array(MYSQLI_ASSOC);
    }

}