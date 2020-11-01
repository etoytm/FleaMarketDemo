<?php
require_once './controller/goodsManage.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>跳蚤市场</title>
    <link href="css/index.css" rel="stylesheet">
    <link href="http://at.alicdn.com/t/font_1524886_uvkjm364bi.css" rel="stylesheet">
    <link href="css/public.css" rel="stylesheet">
    <link href="css/swiper.min.css" rel="stylesheet">
    <script src="js/jquery-3.4.1.js"></script>
</head>

<body>


<!-- 顶部 -->
<?php require_once('./include/echo_header.php') ?>
<div class="right">
    <ul class="wrap1">
        <li><a href="myinfo.php"><span class="iconfont icon-ren-copy"></span></a></li>
        <li><a href="cart.html"><span class="iconfont icon-gouwuche2"></span><span>购物车<b
                            class="numc">0</b></span></a></li>
        <li><a href="shop.html"><span class="iconfont icon-shouhou1"></span><span>售后服务</span></a></li>
    </ul>
</div>

<!-- logo 搜索 -->
<section class="section1 wrap">
    <div class="logo">
        <a href="index.php"><img src="images/logo.png"></a>
    </div>
    <div class="search">
        <input class="search-input" autofocus=" autofocus" type="text" placeholder="请输入你想要搜索的内容" value="">
        <button
                id="search-sea">搜索
        </button>
        <ul class="search-result"></ul>
    </div>
</section>


<!-- 商品分类 -->
<section class="section2">
    <div class="nav wrap">
        <a href="shop.html"><span class="nav-li iconfont icon-tubiao1-copy"></span>全部商品分类</a>
        <a href="shop.html">今日烟大</a>
        <a href="shop.html">拼车</a>
        <a href="shop.html">表白墙</a>
        <a href="shop.html">出票</a>
        <a href="shop.html">活动组团</a>
        <a href="shop.html">拼多多砍一刀</a>
    </div>
    <div class="section2-center">
        <!--分类列表-->
        <div class="wrap navleft">
            <ul class="left">
                <li class="left-sub">
                    <a href="shop.html"> 手机</a>
                    <ul class="left-sub-hid">
                        <div class="left-hid-s">
                            <ul class="hid-box">
                                <!--对应商品列表-->
                                <li><a href="shop.html"> vivo</a></li>
                                <li><a href="shop.html"> OPPO</a></li>
                                <li><a href="shop.html"> realme</a></li>
                                <li><a href="shop.html"> 三星</a></li>
                                <li><a href="shop.html"> 魅族</a></li>
                            </ul>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>


        <!-- 中间滚动部分 -->
        <!-- Swiper -->
        <div class="swiper-container-bannerlun">
            <div class="swiper-wrapper">
                <!--滚动商品列表-->
                <div class="swiper-slide">
                    <a href="shop.html"><img src="images/banner-bj_(1).jpg"></a>
                </div>
                <div class="swiper-slide">
                    <a href="shop.html"><img src="images/banner-bj_(2).jpg"></a>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination" id="points"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next btn-right"></div>
            <div class="swiper-button-prev btn-left"></div>
        </div>

    </div>
</section>


<!-- 商品列表 -->
<div class="main-tit">—— <b>抢购列表</b>——</div>
<section class="section3">
    <ul class="rush-list">
        <?php
        $list = getGoodsList();
        foreach ($list as $goods) {
            if ($goods->getType() == 1){
                echo <<<ETO
                <li class="rush-item">
                    <div class="shadow">
                        <div class="sec3-img">
                        <a href="./shopdetail.php?gid={$goods->getGid()}">{$goods->getPreview()}</a>
                           
                            <div class="get-time" data-timenow="2019-11-30,10:00:00">距离抢购开始还有<br>1小时5分10秒</div>
                        </div>
                        <div class="info">
                            <h3 title="">{$goods->getName()}</h3>
                            <p>{$goods->getDescription()}</p>
                            <p><span>{$goods->getPriceNow()}元</span>
                                <del>{$goods->getPriceOld()}元</del>
                            </p>
                            <button onclick="buy({$goods->GetGid()})">去购买</button>
                        </div>
                    </div>
                </li>
ETO;
            }

        }
        ?>
    </ul>
</section>
<div>
    <div class="main-tit">—— <b>商品列表</b>——</div>
    <ul class="wrap shopwrap">
        <?php
        $list = getGoodsList();
        foreach ($list as $goods) {
            if ($goods->getType() == 2)
                echoGoodsInHtml($goods, 2);
        }
        ?>
    </ul>
</div>

<!-- 页脚 -->
<div class="main-tit">—— <b>END </b>——</div>
<footer>

    <ul class="footer-top">
        <li>
            <div class="iconfont icon-wuyoushouhou"></div>
            <div class="footer-top-tit">
                <div><a href="shop.html">正品保障</a></div>
                <div>正品保障、提供发票</div>
            </div>
        </li>
        <li>
            <div class="iconfont icon-yunliankeji_gongyinglianfuben"></div>
            <div class="footer-top-tit">
                <div><a href="shop.html">急速物流</a></div>
                <div>如约送货、送货入户</div>
            </div>
        </li>
        <li>
            <div class="iconfont icon-shouhouwuyou"></div>
            <div class="footer-top-tit">
                <div><a href="shop.html">售后无忧</a></div>
                <div>30天包退、365天包换</div>
            </div>
        </li>
        <li>
            <div class="iconfont icon-tesefuwu"></div>
            <div class="footer-top-tit">
                <div><a href="shop.html">特色服务</a></div>
                <div>私人订制家电套餐</div>
            </div>
        </li>
        <li>
            <div class="iconfont icon-bangzhuzhongxin1"></div>
            <div class="footer-top-tit">
                <div><a href="shop.html">帮助中心</a></div>
                <div>你的购物指南</div>
            </div>
        </li>
    </ul>
    <ul class="footer-bottom">
        <li>
            <div class="footer-bottom-tit">购物指南</div>
            <ul>
                <li><a href="shop.html">保障范围</a></li>
                <li><a href="shop.html">购物流程</a></li>
                <li><a href="shop.html">会员介绍</a></li>
                <li><a href="shop.html">生活旅行</a></li>
                <li><a href="shop.html">常见问题</a></li>
                <li><a href="shop.html">联系客服购物指南</a></li>
            </ul>
        </li>
        <li>
            <div class="footer-bottom-tit">特色服务</div>
            <ul>
                <li><a href="shop.html">保障范围</a></li>
                <li><a href="shop.html">购物流程</a></li>
                <li><a href="shop.html">会员介绍</a></li>
                <li><a href="shop.html">生活旅行</a></li>
                <li><a href="shop.html">常见问题</a></li>
                <li><a href="shop.html">联系客服购物指南</a></li>
            </ul>
        </li>
        <li>
            <div class="footer-bottom-tit">帮助中心</div>
            <ul>
                <li><a href="shop.html">保障范围</a></li>
                <li><a href="shop.html">购物流程</a></li>
                <li><a href="shop.html">会员介绍</a></li>
                <li><a href="shop.html">生活旅行</a></li>
                <li><a href="shop.html">常见问题</a></li>
                <li><a href="shop.html">联系客服购物指南</a></li>
            </ul>
        </li>
        <li>
            <div class="footer-bottom-tit">新手指导</div>
            <ul>
                <li><a href="shop.html">保障范围</a></li>
                <li><a href="shop.html">购物流程</a></li>
                <li><a href="shop.html">会员介绍</a></li>
                <li><a href="shop.html">生活旅行</a></li>
                <li><a href="shop.html">常见问题</a></li>
                <li><a href="shop.html">联系客服购物指南</a></li>
            </ul>
        </li>
    </ul>
    <div class="footer-copy">
        Copyright ©2020 版权所有@跳蚤市场商城 蜀ICP备00000000<br>
        本网站直接或间接向消费者推销商品或者服务的商业宣传均属于“广告” （包装及参数、售后保障等商品信息除外）<br>
        流量统计
    </div>
</footer>
<script src="js/swiper.min.js"></script>
<script src="js/index.js"></script>
<script>
    function buy(gid) {
        location.href = './shopdetail.php?gid=' + gid;
    }
</script>
</body>
