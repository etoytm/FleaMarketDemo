<?php
session_start();
echo <<<ETO
    <script>
        if(confirm("您确认要注销认证吗？"))
            
    </script>
ETO;


require_once '../class/DB.php';
$db = new DB();
$sql = "UPDATE `users` SET `school_number` = NULL, `uid_identify` = '0' WHERE `uid` = '{$_SESSION['uid']}';";
require_once '../include/alert.php';

if ($db->query($sql)) {
    alt_back('成功注销认证！');
} else {
    alt_back("未知错误！");
}