<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-10-29
 * Time: 10:54
 */

require_once('./include/online.php');

$href = array(2);
$show = array(2);
echo <<<ETO
    <link href="./css/index.css" rel="stylesheet">
    <link href="https://at.alicdn.com/t/font_1524886_uvkjm364bi.css" rel="stylesheet">
    <link href="./css/public.css" rel="stylesheet">
    <link href="./css/swiper.min.css" rel="stylesheet">
    <header  class="header">
    <!-- 中间 -->
    <div class="wrap">
        <!-- 左边 -->
        <ul class="header-left">
            <li class="header-left-nav">
                <div class="header-tit"><a href="index.php">网站导航</a><span class="header-ico-sele">></span></div>
                <div class="header-left-hid">
                    <ul>
                        <li><a href="./index.php">首页</a></li>
                        <li><a href="">更多热点</a></li>
                    </ul>
                </div>
            </li>
            <li class="header-left-nav">
                <div class="header-tit">商业合作<span class="header-ico-sele">></span></div>
                <div class="header-left-hid">
                    <ul>
                        <li><a href="shop.html">预定广告位</a></li>
                        <li><a href="shop.html">长期投放</a></li>
                        <li><a href="shop.html">交流中心</a></li>
                    </ul>
                </div>
            </li>
            <li class="header-left-nav">
                <div class="header-tit">帮助中心<span class="header-ico-sele">></span></div>
                <div class="header-left-hid">
                    <ul>
                        <li><a href="shop.html">客服咨询</a></li>
                        <li><a href="shop.html">数据找回</a></li>
                        <li><a href="shop.html">信息修复</a></li>
                    </ul>
                </div>
            </li>
            <li class="header-left-nav">
                <div class="header-tit"><span class="loca iconfont icon-dizhitianchong-"></span><b id="header-loca-di">烟大</b></div>
                

            </li>
        </ul>
ETO;
//如果已经登录
if (online())
    echo <<<ETO
        <!-- 右边 -->
        <ul class="header-right">
            <li class="header-left-nav">
                <div class="header-tit"><a href="myinfo.php">我的</a><span class="header-ico-sele">></span></div>
                <div class="header-left-hid">
                    <ul>
                        <li><a href="myinfo.php">我的信息</a></li>
                        <li><a href="./login.html">切换账号</a></li>
                        <li><a href="./include/logout_session.php">退出登录</a></li>                     
                    </ul>
                </div>
            </li>
            <li class="header-right-tit">
                <a href="postGood.php">发布</a>
            </li>
        </ul>
    </div>
</header>
ETO;
//未登录
else echo <<<ETO
        <!-- 右边 -->
        <ul class="header-right">
            <li class="header-right-tit">
                <a href="login.html">请登录</a>
            </li>
            <li class="header-right-tit">
                <a href="register.html">注册有礼</a>
            </li>
        </ul>
    </div>
</header>
ETO;

