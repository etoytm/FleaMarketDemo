<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020-11-07
 * Time: 19:53
 */
echo <<<ETO
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

    function search_keyword() {
        let key_ = document.getElementById('key_input').value;
        location.href = 'seekPage.php?keyword=' + key_;
    }
</script>    
ETO;
