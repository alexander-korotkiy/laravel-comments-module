<?php

namespace Deka\Comments\Application\Services\Request;

use Illuminate\Http\Request;

class CreateNewComment
{

    const DEFAULT_STATUS = 'new';

    /**
     * @var int
     */
    private $goods_id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $text;

    /**
     * @var int
     */
    private $subscriptions;

    /**
     * @var string
     */
    private $status;

    /**
     * @var int
     */
    private $reviews_count;

    /**
     * @var int
     */
    private $rating;

    /**
     * CreateNewComment constructor.
     * @param int $goods_id
     * @param Request $request
     */
    public function __construct(int $goods_id, Request $request)
    {
        $this->goods_id = $goods_id;
        $this->name = $request->name;
        $this->email = $request->email;
        $this->text = $request->comment;
        $this->subscriptions = 0;
        $this->status = self::DEFAULT_STATUS;
        $this->reviews_count = 0;
        $this->rating = $request->rating ?? null;
    }

    /**
     * @return int
     */
    public function getGoodsId() : int
    {
        return $this->goods_id;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getText() : string
    {
        return $this->text;
    }

    /**
     * @return int
     */
    public function getSubscriptions() : int
    {
        return $this->subscriptions;
    }

    /**
     * @return string
     */
    public function getStatus() : string
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getReviewsCount() : int
    {
        return $this->reviews_count;
    }

    /**
     * @return float
     */
    public function getRating() : float
    {
        return $this->rating;
    }

    public function toArray() {
        return [
            'goods_id' => $this->goods_id,
            'name' => $this->name,
            'email' => $this->email,
            'text' => $this->text,
            'subscription' => $this->subscriptions,
            'status' => $this->status,
            'reviews_count' => $this->reviews_count,
            'rating' => $this->rating,
        ];
    }
}
