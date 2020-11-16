<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>详情页面</title>
    <link href="css/shopdetail.css" rel="stylesheet" type="text/css">

    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/common.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var showproduct = {
                "boxid": "showbox",
                "sumid": "showsum",
                "boxw": 400,
                "boxh": 550,
                "sumw": 60,//列表每个宽度,该版本中请把宽高填写成一样
                "sumh": 60,//列表每个高度,该版本中请把宽高填写成一样
                "sumi": 7,//列表间隔
                "sums": 5,//列表显示个数
                "sumsel": "sel",
                "sumborder": 1,//列表边框，没有边框填写0，边框在css中修改
                "lastid": "showlast",
                "nextid": "shownext"
            };//参数定义
            $.ljsGlasses.pcGlasses(showproduct);//方法调用，务必在加载完后执行

            $(function () {

                $('.tabs a').click(function () {

                    var $this = $(this);
                    $('.panel').hide();
                    $('.tabs a.active').removeClass('active');
                    $this.addClass('active').blur();
                    var panel = $this.attr("href");
                    $(panel).show();
                    return fasle;  //告诉浏览器  不要纸箱这个链接
                })//end click


                $(".tabs li:first a").click()   //web 浏览器，单击第一个标签吧


            })//end ready

            $(".centerbox li").click(function () {
                $("li").removeClass("now");
                $(this).addClass("now")

            });


        });


    </script>
</head>
<style>
    .sendButton { /* 按钮美化 */
        width: 270px; /* 宽度 */
        height: 40px; /* 高度 */
        border-width: 0px; /* 边框宽度 */
        border-radius: 3px; /* 边框半径 */
        background: #1E90FF; /* 背景颜色 */
        cursor: pointer; /* 鼠标移入按钮范围时出现手势 */
        outline: none; /* 不显示轮廓线 */
        font-family: Microsoft YaHei; /* 设置字体 */
        color: white; /* 字体颜色 */
        font-size: 17px; /* 字体大小 */
    }

    .sendButton:hover { /* 鼠标移入按钮范围时改变颜色 */
        background: #5599FF;
    }
</style>
<body>
<!-----header部分------->
<?php
require_once("./include/echo_header.php");
$gid = $_GET['gid'];
require_once("./controller/getDetail.php");
?>
<!-----logo_search部分------->
<div class="logobg">
    <div class="center">
        <div class="logo">
            <img style="margin-left: 290px" src="images/logo.png" width="249">
        </div>

    </div>
</div>
<!-----主导航部分------->
<style>
    .mynav {
        height: 30px;
    }

    .mynav a {
        display: inline-block;
        width: 10%;
        font-size: 15px;
        line-height: 30px;
    }

    .mynav a:hover {
        background-color: #00a0e9;
        color: darkblue;
    }
</style>
<div class="bottom">
    <div style="text-align: center;align-items: center;" class="mynav">
        <?php
        $show = array('生活用品', '影票场票', '二手车', '取快递', '拼车');
        foreach ($show as $s) {
            echo "<a href=\"seekPage.php?keyword={$s}\">{$s}</a>";
        }
        ?>
    </div>
</div>


</div>
<!-----header结束------->
<!-----商品详情部分------->
<div class="shopdetails">
    <!-------放大镜-------->
    <div id="leftbox">
        <div id="showbox">
            <!--            --><?php
            foreach ($imgs as $img) {
                echo <<<ETO
                  <img src={$img} width="400" height="400" />
ETO;
                echo PHP_EOL;
            }
            //多图显示的话，这里必须再输出一次首图，否则显示异常
                echo <<<ETO
                    <img src={$img[0]} width="400" height="400" />
ETO;

            //            ?>


        </div><!--展示图片盒子-->

        <div id="showsum"></div><!--展示图片里边-->
        <p class="showpage">
            <a href="javascript:void(0);" id="showlast"> < </a>
            <a href="javascript:void(0);" id="shownext"> > </a>
        </p>

    </div>
    <!----中间----->

    <div class="centerbox">
        <p class="imgname"><?php echo $name; ?></p>
        <p class="Aprice">入手价：<samp>￥<?php echo $price_old; ?></samp></p>
        <p class="price">二手价二手价：<samp>￥<?php echo $price_now; ?></samp></p>
        <p class="">货主说：</p>

        <div class="clear"><?php echo $description ?></div>
        <p class="buy"><a href="#" id="firstbuy">立即购买 </a><a
                    href="tencent://message/?uin=<?php echo $qq; ?>&Site=&Menu=yes">询问货主</a></p>
        <div class="clear">
        </div>

        <div class="fenx"><a href="#"><img src="images/shopdetail/tell07.png"></a>
            发布时间：<?php echo $post_time; ?>
        </div>
    </div>


    <!-----右边------->
    <div class="rightbox">
        <p class="name">——相关</p>
        <?php
        require_once("./controller/getRelated.php");
        $res = getRelated($tag);
        $i = 0;
        while ($arr = mysqli_fetch_assoc($res)) {
            if ($i++ == 3) {
                break;
            }
            ?>
            <a href="shopdetail.php?gid=<?php echo $arr['gid'] ?>"><img src=<?php echo $arr['preview'] ?> width="160"
                                                                        height="160"></a>

            <p>￥<?php echo $arr['price_now'] ?>元</p>
            <?php
        }

        ?>


    </div>

</div>
<!-----商品详情部分结束------->
<!-----商品详情评论部分------->
<div class="evaluate">

    <div class="classify">
        <div class="shopim">
            <?php
            require_once("./controller/userManage.php");
            $ownerInfo = getUserArrByGid($_GET['gid']);
            echo <<<ETO
            <p class="name">
                <img style="width:30px; height:30px; border-radius:50%;" src="{$ownerInfo['head']}" >
                {$ownerInfo['nick']}
            </p>
            <p>信誉分:{$ownerInfo['credit']}</p>
            <p class="sc"><a href="tencent://message/?uin={$ownerInfo['qq']}&Site=&Menu=yes">发起聊天</a></p>
            <!--<p class="sc"><a href="#">进入店铺</a></p>-->
            <div class="search">
                <input class="left" type="text"/>
                <input class="right" type="button" style=" cursor:pointer;" value=""/>
            </div>
ETO;

            ?>

        </div>
        <div class="shopfl">
            <p class="name">分类</p>
            <ul>
                <li><a href="#"><img src="images/shopdetail/tell02.png" width="10" height="10">全部物品</a></li>
                <li><a href="#"><img src="images/shopdetail/tell02.png" width="10" height="10">其他二手</a></li>
            </ul>
        </div>


    </div>


    <div class="tabbedPanels">
        <ul class="tabs">
            <li><a href="#panel01">评论</a></li>
            <li><a href="#panel02" class="active">TA的发布</a></li>
            <li><a href="#panel03">商品推荐</a></li>
        </ul>

        <div class="panelContainer">
            <!--            评论-->
            <div class="panel" id="panel01">
                <form action="controller/sendComment.php?gid=<?php echo $_GET['gid']; ?>&ctype=comment" method="POST">
                    <textarea name="text"
                              style="border:0;border-radius:5px;background-color:rgba(241,241,241,.98);width: 355px;height: 100px;padding: 10px;resize: none;"
                              placeholder="询价备注（尺寸、材质等）"></textarea>
                    <input type="submit" value="发布" class="sendButton">
                </form>
                <?php
                require_once("./controller/getComments.php");
                $res = getComments($_GET['gid']);
                $commentsNum = mysqli_num_rows($res);
                ?>
                <p class="judge">全部评论(<?php echo $commentsNum; ?>)<span></span></p>

                <?php
                while ($arr = mysqli_fetch_assoc($res)) {
                    echo <<<ETO
                <div style="height: 180px" class="judge01">
                    <div class="idimg"><img style="width:48.99px; height:48.99px; border-radius:50%;" width="48.99" height="48.99" src="{$arr['head']}"></div>
                    <div class="write">
                        <p class="idname">{$arr['nick']}</p>
                        <p>{$arr['text']}</p>
                        <p class="which">{$arr['ctime']}</p>
                        <!--<img src="images/shopdetail/detail105.jpg" width="40px" height="40px">-->

                    </div>
                </div>                
ETO;

                }
                ?>



            </div>

            <!--            历史发布-->
            <div class="panel" id="panel02">

                <p class="sell">发布的</p>
                <div class="com">
                    <?php
                    require_once("./controller/getPostHistory.php");
                    $res = getPostHistoryByGid($_GET['gid']);
                    while ($arr = mysqli_fetch_assoc($res)) {
                        echo <<<ETO
                    <a href="shopdetail.php?gid={$arr['gid']}" class="ex01">
                        <figure>
                            <img width="190px" height="190px" src={$arr['preview']}>
                            <figcaption>{$arr['tag']}</figcaption>
                        </figure>
                    
                        <p>{$arr['name']}</p>
                        <div class="bottom"><samp>￥{$arr['price_now']}</samp><input type="button" style="cursor:pointer;" value="去看看"/></div>
                    </a>
ETO;

                    }
                    ?>


                </div>
                <div class="clear"></div>

            </div>

            <div class="panel" id="panel03">
                <div>
                    <p>创意造型 浓浓文艺气息 闲暇时光 与好友分享</p>
                    <p></p>
                    <p class="sell">整体款式</p>

                    <img src="images/shopdetail/evaluate101.jpg">
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>

            </div>


        </div>

    </div>

</div>

<!-----商品详情评论部结束分------->

<!----bottom_页脚部分----->

<script src="js/swiper.min.js"></script>
<script src="js/index.js"></script>
<script>
    function buy(gid) {
        location.href = './shopdetail.php?gid=' + gid;
    }

    function search_keyword() {
        let key_ = document.getElementById('key_input').value;
        location.href = 'seekPage.php?keyword=' + key_;
    }
</script>
</body>
</html>
