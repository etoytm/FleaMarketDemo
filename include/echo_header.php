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
    <link href="http://at.alicdn.com/t/font_1524886_uvkjm364bi.css" rel="stylesheet">
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
                        <li><a href="shop.html">特色购物</a></li>
                        <li><a href="shop.html">更多热点</a></li>
                    </ul>
                </div>
            </li>
            <li class="header-left-nav">
                <div class="header-tit">商家入驻<span class="header-ico-sele">></span></div>
                <div class="header-left-hid">
                    <ul>
                        <li><a href="shop.html">合作招商</a></li>
                        <li><a href="shop.html">服务市场</a></li>
                        <li><a href="shop.html">金融中心</a></li>
                        <li><a href="shop.html">培训中心</a></li>
                        <li><a href="shop.html">规则中心</a></li>
                    </ul>
                </div>
            </li>
            <li class="header-left-nav">
                <div class="header-tit">客户服务<span class="header-ico-sele">></span></div>
                <div class="header-left-hid">
                    <ul>
                        <li><a href="shop.html">帮助中心</a></li>
                        <li><a href="shop.html">查找门店</a></li>
                        <li><a href="shop.html">退换/维修</a></li>
                        <li><a href="shop.html">意见反馈</a></li>
                        <li><a href="shop.html">在线咨询</a></li>
                    </ul>
                </div>
            </li>
            <li class="header-left-nav">
                <div class="header-tit"><span class="loca iconfont icon-dizhitianchong-"></span><b id="header-loca-di">成都</b>
                </div>
                <div class="header-left-hid" id="header-locat">
                    <select id="province" onclick="provic()">
                        <!-- <option value="">-请选择省-</option> -->
                    </select>
                    <select id="city" onclick="cityclick()">
                        <option value="">-请选择市-</option>
                    </select>
                    <select id="district" onclick="dis()">
                        <option value="">-请选区-</option>
                    </select>
                </div>

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
                <a href="postGood.php">发布商品</a>
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
                <a href="signin.html">注册有礼</a>
            </li>
        </ul>
    </div>
</header>
ETO;

