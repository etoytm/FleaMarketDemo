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

<body>
<!-----header部分------->
<?php
require_once("./include/echo_header.php");
$gid= $_GET['gid'];
require_once("./controller/getDetail.php");
?>
<!-----logo_search部分------->
<div class="logobg">
    <div class="center">
        <div class="logo">
            <img src="images/logo.png" width="249" height="55">
        </div>
        <form id="searchForm">
            <input type="text" id="searchTxt">
            <input type="submit" value="搜  索" id="search_btn">
        </form>
    </div>
</div>
<!-----主导航部分------->
<div class="bottom">
    <div class="menu"><a href="#">全部商品分类</a></div>
    <div class="nav">
        <a href="index.html" class="now">首页</a>
        <a href="tuangou.html">团购促销</a>
        <a href="mingshihuicui.html">名师荟萃</a>
        <a href="yipinyizhan.html">艺品驿站</a>
        <a href="western.html">欧式摆件</a>
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
                echo "<img width= \"400\" height=\"550\" src=".$img." >";
                echo PHP_EOL;
            }
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
        <p class="price">二手价：<samp>￥<?php echo $price_now; ?></samp></p>
        <p class="">货主说：</p>

        <div class="clear"><?php echo $description?></div>
        <p class="buy"> <a href="#" id="firstbuy">立即购买 </a><a href="tencent://message/?uin=<?php  echo $qq;?>&Site=&Menu=yes">询问货主</a></p>
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
        require_once ("controller/getRelated.php");
        $res = getRelated($tag);
        $i = 0;
        while ($arr =mysqli_fetch_assoc($res)){
            if($i == 3){
                break;
            }
            ?>
            <a href="shopdetail.php?gid=<?php echo $arr['gid']?>"><img src=<?php echo $arr['preview']?> width="130" height="180"></a>

            <p>￥<?php echo $arr['price_now']?>元</p>
            <?php
        }

        ?>



    </div>

</div>
<!-----商品详情部分结束------->
<!-----商品详情评价部分------->
<div class="evaluate">

    <div class="classify">
        <div class="shopim">
            <p class="name">青蛙工艺家居<img src="images/shopdetail/tell01.png" width="22" height="22"></p>
            <img src="images/shopdetail/tellbottom.png">
            <p class="sc"><a href="#">收藏店铺</a></p>
            <p class="sc"><a href="#">进入店铺</a></p>
            <div class="search">
                <input class="left" type="text"/>
                <input class="right" type="button" style=" cursor:pointer;" value=""/>
            </div>
        </div>
        <div class="shopfl">
            <p class="name">本店分类</p>
            <ul>
                <li><a href="#"><img src="images/shopdetail/tell02.png" width="10" height="10">全部商品</a></li>
                <li><a href="#"><img src="images/shopdetail/tell02.png" width="10" height="10">木质商品</a></li>
                <li><a href="#"><img src="images/shopdetail/tell02.png" width="10" height="10">石制商品</a></li>
                <li><a href="#"><img src="images/shopdetail/tell02.png" width="10" height="10">陶制商品</a></li>
                <li><a href="#"><img src="images/shopdetail/tell02.png" width="10" height="10">家居厨房</a></li>
                <li><a href="#"><img src="images/shopdetail/tell02.png" width="10" height="10">欧式混搭</a></li>
                <li><a href="#"><img src="images/shopdetail/tell02.png" width="10" height="10">桌面摆件</a></li>
                <li><a href="#"><img src="images/shopdetail/tell02.png" width="10" height="10">书香文房</a></li>
            </ul>
        </div>



    </div>


    <div class="tabbedPanels">
        <ul class="tabs">
            <li><a href="#panel01">TA的发布</a></li>
            <li><a href="#panel02" class="active">评价</a></li>
            <li><a href="#panel03">商品推荐</a></li>
        </ul>

        <div class="panelContainer">
            <div class="panel" id="panel01">
                <div>
                    <p>创意造型 浓浓文艺气息 闲暇时光 与好友分享</p>
                    <p></p>
                    <p class="sell">整体款式</p>
                    <?php
                    require_once ("./controller/getPostHistory.php");
                    //TO DO
                    ?>
                    <img src="images/shopdetail/evaluate101.jpg">
                    <div class="clear"></div>
                </div>

            </div>

            <div class="panel" id="panel02">
                <p class="sell">买家评价</p>
                <img src="images/shopdetail/detail101.png">
                <p class="judge">全部评价(20)<span>晒图(13)</span></p>

                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">落***1</p>
                        <p>
                            杯子很可爱！就是有两三个杯子后面的小图案有一丢丢斜下来，不过没多大关系，其他的还好。有一点真的特别特别好的就是😂包裹的非常非常非常严实，简直就是里三层外三层！杯子完好无损，赠送的刷子也包装的很好😂让我第一眼以为那是一个棉花糖hhh</p>
                        <p class="which">颜色:创意胡子</p>
                        <img src="images/shopdetail/detail103.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail104.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail105.jpg" width="40px" height="40px">

                    </div>
                </div>

                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">席***2</p>
                        <p>质量很好，快递也很快，拆包裹很艰难～～～包得太好了，没有碎。厚度也可以。值得购买！</p>
                        <p class="which">颜色:熊猫套装</p>
                        <img src="images/shopdetail/detail106.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail107.jpg" width="40px" height="40px">
                    </div>
                </div>

                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">怒***4</p>
                        <p>特别好，必须赞👍，质量好，很漂亮，快递也好快的。还挺优惠。看图吧。</p>
                        <p class="which">颜色:熊猫套装</p>
                        <img src="images/shopdetail/detail108.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail109.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail110.jpg" width="40px" height="40px">
                    </div>
                </div>

                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">毛***字</p>
                        <p>很精致，用起来很满意，做工也非常的细致，用着很满意哦，非常值得购买</p>
                        <p class="which">颜色:创意胡子</p>
                        <img src="images/shopdetail/detail103.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail104.jpg" width="40px" height="40px">
                    </div>
                </div>

                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">轻***4</p>
                        <p>店家服务太贴心了，没有破碎，包装非常严实</p>
                        <p class="which">颜色:铁塔套装</p>
                        <img src="images/shopdetail/detail106.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail107.jpg" width="40px" height="40px">
                    </div>
                </div>

                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">里***2</p>
                        <p>不错，很可爱包装很好，赶快下手吧</p>
                        <p class="which">颜色:四色小猫</p>
                        <img src="images/shopdetail/detail103.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail104.jpg" width="40px" height="40px">
                    </div>
                </div>

                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">啥***2</p>
                        <p>一直想要咖啡杯，这次总算拿到手了。很不错的陶瓷杯。图案也很可爱。实物与图一样。</p>
                        <p class="which">颜色:熊猫套装</p>
                        <img src="images/shopdetail/detail108.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail110.jpg" width="40px" height="40px">
                    </div>
                </div>


                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">胡***2</p>
                        <p>宝贝很实惠 拆包装的时候很惊讶 竟然包了四层！完好无损</p>
                        <p class="which">颜色:四色小猫</p>
                        <img src="images/shopdetail/detail103.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail104.jpg" width="40px" height="40px">
                    </div>
                </div>

                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">落***1</p>
                        <p>
                            杯子很可爱！就是有两三个杯子后面的小图案有一丢丢斜下来，不过没多大关系，其他的还好。有一点真的特别特别好的就是😂包裹的非常非常非常严实，简直就是里三层外三层！杯子完好无损，赠送的刷子也包装的很好😂让我第一眼以为那是一个棉花糖hhh</p>
                        <p class="which">颜色:创意胡子</p>
                        <img src="images/shopdetail/detail103.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail104.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail105.jpg" width="40px" height="40px">

                    </div>
                </div>
                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">轻***4</p>
                        <p>店家服务太贴心了，没有破碎，包装非常严实</p>
                        <p class="which">颜色:铁塔套装</p>
                        <img src="images/shopdetail/detail106.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail107.jpg" width="40px" height="40px">
                    </div>
                </div>

                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">里***2</p>
                        <p>不错，很可爱包装很好，赶快下手吧</p>
                        <p class="which">颜色:四色小猫</p>
                        <img src="images/shopdetail/detail103.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail104.jpg" width="40px" height="40px">
                    </div>
                </div>
                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">怒***4</p>
                        <p>特别好，必须赞👍，质量好，很漂亮，快递也好快的。还挺优惠。看图吧。</p>
                        <p class="which">颜色:熊猫套装</p>
                        <img src="images/shopdetail/detail108.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail109.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail110.jpg" width="40px" height="40px">
                    </div>
                </div>
                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">里***2</p>
                        <p>不错，很可爱包装很好，赶快下手吧</p>
                        <p class="which">颜色:四色小猫</p>
                        <img src="images/shopdetail/detail103.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail104.jpg" width="40px" height="40px">
                    </div>
                </div>

                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">啥***2</p>
                        <p>一直想要咖啡杯，这次总算拿到手了。很不错的陶瓷杯。图案也很可爱。实物与图一样。</p>
                        <p class="which">颜色:熊猫套装</p>
                        <img src="images/shopdetail/detail108.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail110.jpg" width="40px" height="40px">
                    </div>
                </div>
                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">毛***字</p>
                        <p>很精致，用起来很满意，做工也非常的细致，用着很满意哦，非常值得购买</p>
                        <p class="which">颜色:创意胡子</p>
                        <img src="images/shopdetail/detail103.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail104.jpg" width="40px" height="40px">
                    </div>
                </div>

                <div class="judge01">
                    <div class="idimg"><img src="images/shopdetail/detail102.png"></div>
                    <div class="write">
                        <p class="idname">轻***4</p>
                        <p>店家服务太贴心了，没有破碎，包装非常严实</p>
                        <p class="which">颜色:铁塔套装</p>
                        <img src="images/shopdetail/detail106.jpg" width="40px" height="40px">
                        <img src="images/shopdetail/detail107.jpg" width="40px" height="40px">
                    </div>
                </div>

                <div class="clear"></div>
            </div>

            <div class="panel" id="panel03">
                <p class="sell">本店热卖商品</p>
                <div class="com">
                    <a href="#" class="ex01">
                        <figure>
                            <img src="images/index_img/content_11.jpg">
                            <figcaption>木质花瓶</figcaption>
                        </figure>
                        <p>木质简约花瓶 亲近大自然</p>
                        <div class="bottom"><samp>商城价:￥34元</samp><input type="button" style=" cursor:pointer;"
                                                                        value="购买"/></div>
                    </a>
                    <a href="#" class="ex01">
                        <figure>
                            <img src="images/index_img/content_12.png">
                            <figcaption>假花篮子</figcaption>
                        </figure>
                        <p>墙上假花优雅系列蓝色篮子</p>
                        <div class="bottom"><samp>商城价:￥543元</samp><input type="button" style=" cursor:pointer;"
                                                                         value="购买"/></div>
                    </a>
                    <a href="#" class="ex01">
                        <figure>
                            <img src="images/index_img/content_13.png">
                            <figcaption>富贵花瓶</figcaption>
                        </figure>
                        <p>白色带金色边创意富贵花瓶</p>
                        <div class="bottom"><samp>商城价:￥888元</samp><input type="button" style=" cursor:pointer;"
                                                                         value="购买"/></div>
                    </a>
                    <a href="#" class="ex01">
                        <figure>
                            <img src="images/index_img/content_14.jpg">
                            <figcaption>手工编织花篮</figcaption>
                        </figure>
                        <p>白色手工编织花篮 小巧简约/p>
                        <div class="bottom"><samp>商城价:￥68元</samp><input type="button" style=" cursor:pointer;"
                                                                        value="购买"/></div>
                    </a>
                    <a href="#" class="ex01">
                        <figure>
                            <img src="images/index_img/content_15.jpg">
                            <figcaption>高脚花瓶</figcaption>
                        </figure>
                        <p>高脚优雅系列花瓶 </p>
                        <div class="bottom"><samp>商城价:￥28元</samp><input type="button" style=" cursor:pointer;"
                                                                        value="购买"/></div>
                    </a>
                    <a href="#" class="ex01">
                        <figure>
                            <img src="images/index_img/content_06.jpg">
                            <figcaption>龙猫灯</figcaption>
                        </figure>
                        <p>创意暖色龙猫小灯</p>
                        <div class="bottom"><samp>商城价:￥48元</samp><input type="button" style=" cursor:pointer;"
                                                                        value="购买"/></div>
                    </a>
                    <a href="#" class="ex01">
                        <figure>
                            <img src="images/index_img/content_07.jpg">
                            <figcaption>墙上挂具</figcaption>
                        </figure>
                        <p>多色可选墙上挂具</p>
                        <div class="bottom"><samp>商城价:￥64元</samp><input type="button" style=" cursor:pointer;"
                                                                        value="购买"/></div>
                    </a>
                    <a href="#" class="ex01">
                        <figure>
                            <img src="images/index_img/content_08.jpg">
                            <figcaption>白色小象</figcaption>
                        </figure>
                        <p>白色小象优雅系列套装</p>
                        <div class="bottom"><samp>商城价:￥143元</samp><input type="button" style=" cursor:pointer;"
                                                                         value="购买"/></div>
                    </a>
                    <a href="#" class="ex01">
                        <figure>
                            <img src="images/index_img/content_09.jpg">
                            <figcaption>石制壁饰</figcaption>
                        </figure>
                        <p>石制墙上创意装饰用品</p>
                        <div class="bottom"><samp>商城价:￥348元</samp><input type="button" style=" cursor:pointer;"
                                                                         value="购买"/></div>
                    </a>
                    <a href="#" class="ex01">
                        <figure>
                            <img src="images/index_img/content_10.jpg">
                            <figcaption>小假山</figcaption>
                        </figure>
                        <p>小假山室内装饰清新空气</p>
                        <div class="bottom"><samp>商城价:￥448元</samp><input type="button" style=" cursor:pointer;"
                                                                         value="购买"/></div>
                    </a>

                </div>

                <div class="clear"></div>
            </div>


        </div>

    </div>

</div>

<!-----商品详情评价部结束分------->

<!----bottom_页脚部分----->
<div class="backf">
    <div id="footer">
        <ul>
            <li class="sy">支付方式</li>
            <li><a href="#">在线支付</a></li>
            <li><a href="#">货到付款</a></li>
            <li><a href="#">发票说明</a></li>
            <li><a href="#">余额宝</a></li>

        </ul>
        <ul>
            <li class="sy">购物指南</li>
            <li><a href="#">免费注册</a></li>
            <li><a href="#">申请会员</a></li>
            <li><a href="#">开通支付宝</a></li>
            <li><a href="#">支付宝充值</a></li>
        </ul>
        <ul>
            <li class="sy">商家服务</li>
            <li><a href="#">联系我们</a></li>
            <li><a href="#">客服服务</a></li>
            <li><a href="#">物流服务</a></li>
            <li><a href="#">缺货赔付</a></li>
        </ul>
        <ul>
            <li class="sy">关于我们</li>
            <li><a href="#">知识产权</a></li>
            <li><a href="#">网站合作</a></li>
            <li><a href="#">规则意见</a></li>
            <li><a href="#">帮助中心</a></li>
        </ul>
        <ul>
            <li class="sy">其他服务</li>
            <li><a href="#">诚聘英才</a></li>
            <li><a href="#">法律声明</a></li>

        </ul>
        <div class="clear"></div>
    </div>
    <div class="foot">
        <p>使用本网站即表示接受 尚美衣店用户协议</p>
        <p>版权所有——————————————————</p>

    </div>
</div>

</body>
</html>
