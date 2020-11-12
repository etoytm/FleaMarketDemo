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
        <input id="key_input" class="search-input" autofocus=" autofocus" type="text" placeholder="请输入你想要搜索的内容" value="">
        <button onclick="return search_keyword()"
            id="search-sea">搜索
        </button>
        <ul class="search-result"></ul>
    </div>
</section>


<!-- 商品分类 -->
<div>
    <div class="main-tit">—— <b style="color:#1718ff;font-style:italic;"><?php echo $_GET['keyword']; ?></b><b>的搜索结果</b>——</div>
    <ul class="wrap shopwrap">
        <?php
        require_once ("./controller/getSeek.php");
        $res = getSeek($_GET['keyword']);
        if($res == null){
            require_once ("./include/alert.php");
            alt_back("输入关键词搜索哦！");
        }
        while ($good = mysqli_fetch_assoc($res)){
            echo <<<ETO
            <li class="main"><a href="shopdetail.php?gid={$good['gid']}" target="_blank"><img src={$good['preview']} alt=""></a>
                <div class="main-detail">
                    <div class="detail-title">{$good['name']}</div>
                    <p style="font-size: small;color: cornflowerblue">{$good['description']}</p>
                    <div class="detail-price"><b class="price">¥{$good['price_now']}</b>
                        <div class="detail-car" onclick="buy({$good['gid']})">去看看</div>
                    </div>
                </div>
            </li>
ETO;
        }

        ?>

    </ul>
</div>

<!-- 页脚 -->
<div class="main-tit">—— <b>END </b>——</div>

<?php
    require_once ("./include/echo_footer.php");
?>
</body>
