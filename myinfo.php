<?php
session_start();
require_once('./include/online.php');
offline_alert();

require_once 'controller/userManage.php';
$arr = getUserArrByUid($_SESSION['uid']);
$head = $arr['head'] == null ? 'images/NoHead.jpg' : $arr['head'];
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="revised" content="Ningxia Seasons, 2015/8/13/"/>
    <!-- 定义页面的最新版本 -->
    <meta name="description" content="网站简介"/>
    <!-- 网站简介 -->
    <meta name="keywords" content="搜索关键字，以半角英文逗号隔开"/>
    <!-- 搜索关键字 -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>某经融公司股权众筹站点 - 个人中心</title>


    <!-- CSS公共部分 开始 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/style.css" rel="stylesheet">
    <!-- CSS公共部分 结束 -->

    <link href="css/crowdfunding.css" rel="stylesheet">

</head>
<body>
<!-- top + banner 开始 -->
<?php

require_once('./include/echo_header.php');
?>
<div style="z-index: -1" class="container-fluid cfh_banner">
    <div class="container"><a href="index.php"><img src="images/logo.png" width="210px"></a>
        <ul class="list-inline">
            <li><a href="index.html" target="_self">首页</a></li>
            <li><a href="list_page.html" target="_self">创业项目</a></li>
            <li><a href="investor_page.html" target="_self">投资人</a></li>
            <li><a href="" target="_self">平台公示</a></li>
            <li><a href="service_page.html" target="_self">服务</a></li>
            <li><a href="" target="_self">新手指南</a></li>
        </ul>
        <div class="cfh_banner_search">
            <div onClick="cfh_banner_search_select(0)" class="cfh_banner_search_select">
                <font id="cfh_banner_search_select_span">请选择</font>
                <ul id="cfh_banner_search_select_ul">
                    <li onClick="cfh_banner_search_select1('项目')">项目</li>
                    <li onClick="cfh_banner_search_select1('投资人')">投资人</li>
                    <li onClick="cfh_banner_search_select1('平台公示')">平台公示</li>
                    <li onClick="cfh_banner_search_select1('指南')">指南</li>
                </ul>
                <input id="cfh_banner_search_select_hideinput" type="hidden" value="">
            </div>
            <input type="text">
            <span><a href="search.html" target="_self">搜索</a></span></div>
    </div>
</div>
<!-- top + banner 结束 -->
<!-- 核心 开始 -->
<div class="container border1 nopadding margin10">
    <div id="vertical_navigation" class="col-lg-3 background831312 nopadding">
        <?php
        //如果未认证，则为临时会员
        //如果已经认证，则是管理员 或者正式会员，取决于privilege的值
        if ($arr['uid_identify'] == 1) { //已经认证
            if ($arr['privilege'] == 0)//privilege==0
                $u_type = '管理员';
            else if ($arr['privilege'] != 0)//privilege!=0
                $u_type = '正式会员';
        } else if ($arr['uid_identify'] == 0)//未认证
            $u_type = '临时会员（未认证）';
        echo <<<ETO
        <div class="dead_pic"><img src="$head"><br>
            <span class="username">$arr[uid]</span>
        </div>
ETO;
        echo '<div class="usertype">用户类型： ' . $u_type . '<br>会员等级：';
        echoUserStarsByPrivilege($arr['privilege'], $arr['uid_identify']);
        echo '</div>';
        echo <<<ETO
        <div class="menu">
            <div class="menu_title"><a href="myinfo.php">我的信息</div>
            <div class="menu_list">
                <ul class="list-unstyled">
                    <li id="listClick1" class="menu_list_on" onClick="listClick(1)"><img
                                src="images/member_center/left_icon_1.png"> 基本信息
                    </li>
                    <li id="listClick2" class="" onClick="click_head()"><img src="images/member_center/left_icon_2.png">
                        修改头像
                    </li>
                    <li id="listClick3" class="" onClick="listClick(3)"><img src="images/member_center/left_icon_2.png">
                        身份认证
                    </li>
                    <li id="listClick4" class="" onClick="listClick(4)"><img src="images/member_center/left_icon_3.png">
                        修改密码
                    </li>
                    <li id="listClick5" class="" onClick="listClick(5)"><img src="images/member_center/left_icon_5.png">
                        申请领投资格
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu">
            <div class="menu_title"> 我相关的项目</div>
            <div class="menu_list">
                <ul class="list-unstyled">
                    <li id="listClick6" class="" onClick="listClick(6)"><img src="images/member_center/left_icon_6.png">
                        项目管理
                    </li>
                    <li id="listClick7" class="" onClick="listClick(7)"><img src="images/member_center/left_icon_6.png">
                        投后管理
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu">
            <div class="menu_title"> 我的资金管理</div>
            <div class="menu_list">
                <ul class="list-unstyled">
                    <li id="listClick8" class="" onClick="listClick(8)"><img src="images/member_center/left_icon_8.png">
                        我的账户
                    </li>
                    <li id="listClick9" class="" onClick="listClick(9)"><img src="images/member_center/left_icon_9.png">
                        投资明细查询
                    </li>
                    <li id="listClick10" class="" onClick="listClick(10)"><img
                                src="images/member_center/left_icon_10.png"> 申请退款
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu">
            <div class="menu_title"> 我的星级和积分</div>
            <div class="menu_list">
                <ul class="list-unstyled">
                    <li id="listClick11" class="" onClick="listClick(11)"><img
                                src="images/member_center/left_icon_9.png"> 星级和积分介绍
                    </li>
                    <li id="listClick12" class="" onClick="listClick(12)"><img
                                src="images/member_center/left_icon_12.png"> 积分纪录
                    </li>
                    <li id="listClick13" class="" onClick="listClick(13)"><img
                                src="images/member_center/left_icon_13.png"> 积分规则
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu">
            <div class="menu_title"> 我的消息</div>
            <div class="menu_list">
                <ul class="list-unstyled">
                    <li id="listClick14" class="" onClick="listClick(14)"><img
                                src="images/member_center/left_icon_14.png"> 发送新消息
                    </li>
                    <li id="listClick15" class="" onClick="listClick(15)"><img
                                src="images/member_center/left_icon_15.png"> 收件箱
                    </li>
                    <li id="listClick16" class="" onClick="listClick(16)"><img
                                src="images/member_center/left_icon_16.png"> 发件箱
                    </li>
                </ul>
            </div>
        </div>
ETO;
        ?>
    </div>
    <div class="col-lg-9">
        <iframe name="left" id="crowdfunding_iframe" src="crowdfunding.center/my_info.php" frameborder="false"
                scrolling="no" style="border:none;" width="100%" height="1045" allowtransparency="true"></iframe>
    </div>
</div>
<!-- 核心 结束 -->

<!-- 版权 开始 -->
<?php
    require_once ("./include/echo_footer.php");
?>

<!-- 结束 -->
<!-- JS公共部分 开始 -->
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/basics.js"></script>
<!-- JS公共部分 结束 -->
<script src="js/crowdfunding.js"></script>
<script>
    function click_head() {
        $('#input_head').click();
    }
</script>
</body>
</html>