<?php
/**
 * Class Goods
 * 商品类，可存储商品的全部信息
 */


class Goods
{
    private $gid;
    private $name;
    private $priceNow;
    private $priceOld;
    private $description = '暂无具体描述';
    private $preview = './images/NoPreview.png';
    private $remain;
    private $type = 2;//默认非抢购商品
    private $tag;
    private $owner_id;

    /**
     * Goods constructor.
     * @param int $gid 商品唯一标识符
     * @param string $name 商品名字
     * @param float $priceNow 当前价格
     * @param float $priceOld 原价
     * @param string $description 商品描述
     * @param string $preview 预览图路径
     * @param int $remain 剩余数量
     * @param int $type 1:抢购商品 or 2:非抢购商品
     * @param string $tag 商品标签
     */
    public function __construct($gid, $name, $priceNow, $priceOld, $description, $preview, $remain, $type, $tag, $owner_id)
    {
        $this->gid = $gid;
        $this->name = $name;
        $this->priceNow = $priceNow;
        $this->priceOld = $priceOld;
        $this->tag = $tag;
        $this->owner_id = $owner_id;
        //如果有，则替换默认值，否则使用默认值
        if ($description != null) {
            //替换默认值
            $this->description = $description;
        }
        if ($preview != null) {
            //替换默认值
            $this->preview = $preview;
        }
        if ($type != null) {
            //替换默认值
            $this->type = $type;
        }
        $this->remain = $remain;
    }

    /**
     * 获取商品唯一标识符
     * @return int
     */
    public function getGid(): int
    {
        return $this->gid;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @return mixed
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag): void
    {
        $this->tag = $tag;
    }

    /**
     * @return float
     */
    public function getPriceNow(): float
    {
        return $this->priceNow;
    }

    /**
     * @param float $priceNow
     */
    public function setPriceNow(float $priceNow): void
    {
        $this->priceNow = $priceNow;
    }

    /**
     * @return float
     */
    public function getPriceOld(): float
    {
        return $this->priceOld;
    }

    /**
     * @param float $priceOld
     */
    public function setPriceOld(float $priceOld): void
    {
        $this->priceOld = $priceOld;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getPreview(): string
    {
        return explode("||",$this->preview)[0];
    }

    /**
     * @param string $preview
     */
    public function setPreview(string $preview): void
    {
        $this->preview = $preview;
    }

    /**
     * @return int
     */
    public function getRemain(): int
    {
        return $this->remain;
    }

    /**
     * @param int $remain
     */
    public function setRemain(int $remain): void
    {
        $this->remain = $remain;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

}