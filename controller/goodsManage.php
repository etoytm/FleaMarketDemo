<?php
/**
 * 商品操作，包含添加商品，删除商品，修改商品等...
 */

require_once './class/DB.php';
require_once './class/Goods.php';


/**
 * 添加商品信息至数据库
 * @param Goods $goods 要添加的商品的实例
 * @return bool 是否添加成功
 */
function addGoods($goods)
{
    $name = $goods->getName();
    $priceNow = $goods->getPriceNow();
    $priceOld = $goods->getPriceOld();
    $description = $goods->getDescription();
    $preview = $goods->getPreview();
    $remain = $goods->getRemain();
    $type = $goods->getType();
    $sql_add = "INSERT INTO `goods`(`name`, `price_now`, `price_old`, `description`, `preview`, `remain`, `type`) VALUES ('$name', $priceNow, $priceOld, $description, $preview, $remain, $type)";
    $db = new DB();
    return $db->query($sql_add);
}

/**
 * 获取全部商品的列表
 * @return ArrayObject Goods对象的列表
 */
function getGoodsList()
{
    $sql = "SELECT * FROM `goods`;";
    $db = new DB();
    $re = $db->query($sql);
    $goodsList = new ArrayObject();
    while (($row = $re->fetch_assoc()) != null) {
        $goodsList->append(getGoodsInstanceByArr($row));
    }
    return $goodsList;
}

/**
 * 在HTML中展示商品
 * @param Goods $goods 要展示的商品的Goods对象
 * @param int $type 1 or 2
 */
function echoGoodsInHtml($goods, $type)
{
    $gid = $goods->getGid();
    $name = $goods->getName();
    $preview = $goods->getPreview();
    $priceNow = $goods->getPriceNow();
    //输出类型1
    if ($type == 1) {
        echo <<<ETO
        <li class="rush-item">
            <div class="shadow">
                <div class="sec3-img">
                    <img src="{$preview}">
                    <div class="get-time" data-timenow="2019-11-30,10:00:00">距离抢购开始还有<br>1小时5分10秒</div>
                </div>
                <div class="info">
                    <h3 title="小米小爱蓝牙音箱随身版 白色">{$name}</h3>
                    <p>{$goods->getDescription()}</p>
                    <p><span>{$priceNow}元</span>
                        <del>{$goods->getPriceOld()}元</del>
                    </p>
                    <button onclick="buy({$gid})">去购买</button>
                </div>
            </div>
        </li>
ETO;
    }
    //输出类型2
    if ($type == 2) {
        echo <<<ETO
        <li class="main"><a href="shop.html"><img src="{$goods->getPreview()}"></a>
            <div class="main-detail">
                <div class="detail-title">{$goods->getName()}</div>
                <div class="detail-price"><b class="price">¥{$goods->getPriceNow()}</b>
                    <div class="detail-car" onclick="buy($gid)">去购买</div>
                </div>
            </div>
        </li>
ETO;
    }
}

/**
 * @param array $arr 存有商品信息的 array
 * @return Goods 封装好的Goods实例
 */
function getGoodsInstanceByArr($arr)
{
    return new Goods(
        $arr['gid'],
        $arr['name'],
        $arr['price_now'],
        $arr['price_old'],
        $arr['description'],
        $arr['preview'],
        $arr['remain'],
        $arr['type'],
        $arr['tag']
    );
}

