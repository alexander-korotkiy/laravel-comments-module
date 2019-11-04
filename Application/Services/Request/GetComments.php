<?php

namespace Deka\Comments\Application\Services\Request;

class GetComments
{
    /**
     * @var int
     */
    private $goods_id;

    /**
     * GetComments constructor.
     * @param int $goods_id
     */
    public function __construct(int $goods_id)
    {
        $this->goods_id = $goods_id;
    }

    /**
     * @return int
     */
    public function getGoodsId() : int
    {
        return $this->goods_id;
    }
}
