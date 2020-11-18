<?php
//验证登录状态时暂时不使用加密，明文检测cookie.uid
$isLogin = isset($_COOKIE['uid']);

if (!$isLogin)
    die(json_encode(array('status' => 'notLogin')));