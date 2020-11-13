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
    <link href="https://at.alicdn.com/t/font_1524886_uvkjm364bi.css" rel="stylesheet">
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
        <input id="key_input" class="search-input" autofocus=" autofocus" type="text" placeholder="请输入你想要搜索的内容"
               value="">
        <button onclick="return search_keyword()"
                id="search-sea">搜索
        </button>
        <ul class="search-result"></ul>
    </div>
</section>


<!-- 商品分类 -->
<section class="section2">
    <div class="nav wrap">
        <a href="shop.html"><span class="nav-li iconfont icon-tubiao1-copy"></span>全部商品分类</a>
        <?php
        $mass = array('今日烟大', '拼车', '表白墙', '出票', '活动组团', '拼多多砍一刀');
        foreach ($mass as $item) {
            echo "        <a href=\"seekPage.php?keyword={$item}\">{$item}</a>";
        }
        ?>
    </div>
    <div class="section2-center">
        <!--分类列表-->
        <div class="wrap navleft">
            <ul class="left">
                <?php
                $tags = [];
                $tags['生活用品'] = array('水壶', '脸盆', '水杯');
                $tags['影票场票'] = array('姜子牙', '夺冠', '校赛辩论赛门票', '蓬莱一日游票');
                $tags['二手车'] = array('自行车', '电瓶车');
                $tags['美妆彩妆'] = array('大宝SOD');
                $tags['取快递'] = array('南校', '北校', '妈妈驿站', '菜鸟驿站', '快宝驿站', '七餐');
                $tags['砍一刀'] = array('拼多多', '双十一叠猫猫', '抖音', '快手');
                $tags['拼车'] = array('烟台火车站', '烟台南站', '蓬莱国际机场', '烟大南校区', '烟大北校区', '东门', '新世界', '上市里');

                ?>
                <?php
                foreach ($tags as $key => $value) {
                    echo "<li class=\"left-sub\">";
                    echo "<a href=\"seekPage.php?keyword={$key}\"> " . $key . "</a>";
                    ?>
                    <ul class="left-sub-hid">
                        <div class="left-hid-s">
                            <ul class="hid-box">
                                <!--对应商品列表-->
                                <?php
                                $item = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20);
                                foreach ($item as $it) {
                                    foreach ($value as $v) {
                                        echo "<li><a href=\"seekPage.php?keyword={$v}\"> " . $v;
                                        echo PHP_EOL;
                                        echo "</a></li>";
                                    }
                                }

                                ?>

                            </ul>
                        </div>
                    </ul>
                    <?php
                    echo "</li>";
                }
                ?>

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
                    <a href="shop.html"><img style="display: block;width: 553px;" src="images/banner-bj_(2).jpg"></a>
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
<div class="main-tit">—— <b>最新发布</b>——</div>
<section class="section3">
    <ul class="rush-list">
        <?php
        $list = getGoodsList();
        foreach ($list as $goods) {
            if ($goods->getType() == 1) {
                $gid = $goods->getGid();
                echo <<<ETO
                <li class="rush-item">
                    <div class="shadow">
                        <div class="sec3-img">
                        <a href="./shopdetail.php?gid={$gid}"><img style="display: block;width: 190px;" src={$goods->getPreview()} alt=""></a>
                           
                            <div class="get-time" data-timenow="2019-11-30,10:00:00">距离抢购开始还有<br>1小时5分10秒</div>
                        </div>
                        <div class="info">
                            <h3 title="">{$goods->getName()}</h3>
                            <p>{$goods->getDescription()}</p>
                            <p><span>{$goods->getPriceNow()}元</span>
                                <del>{$goods->getPriceOld()}元</del>
                            </p>
                            <button onclick="buy($gid)">查看详情</button>
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
    <div class="main-tit">—— <b>更多</b>——</div>
    <ul class="wrap shopwrap">
        <?php
        $list = getGoodsList();

        foreach ($list as $goods) {
            if ($goods->getType() == 2) {
                $gid = $goods->getGid();
                echo <<<ETO
            <li class="main"><a href="shopdetail.php?gid={$gid}"><img src={$goods->getPreview()} alt=""></a>
                <div class="main-detail">
                    <div class="detail-title">{$goods->getName()}</div>
                    <p style="font-size: small;color: cornflowerblue">{$goods->getDescription()}</p>
                    <div class="detail-price"><b class="price">¥{$goods->getPriceNow()}</b>
                        <div class="detail-car" onclick="buy($gid)">去看看</div>
                    </div>
                </div>
            </li>
ETO;
                ?>
                <?php
            }
        }
        ?>

    </ul>
</div>

<!-- 页脚 -->
<div class="main-tit">—— <b>END </b>——</div>
<?php
require_once("./include/echo_footer.php");
?>
</body>
