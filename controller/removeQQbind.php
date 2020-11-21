<?php
session_start();
echo <<<ETO
    <script>
        if(confirm("您确认要注销QQ绑定吗？"))
            
    </script>
ETO;


require_once '../class/DB.php';
$db = new DB();
$sql = "UPDATE `users` SET `qq_identify` = NULL, `qq_identify` = '0' WHERE `uid` = '{$_SESSION['uid']}';";
require_once '../include/alert.php';

if ($db->query($sql)) {
    $_SESSION['qq_identify'] = '0';
    alt_back('成功注销QQ！');
} else {
    alt_back("未知错误！");
}