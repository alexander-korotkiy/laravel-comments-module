<?php

namespace Deka\Comments\Infrastructure\DTO;

use Deka\Common\Helpers\PropertySetter;

class Comments extends PropertySetter {

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $goods_id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var integer
     */
    protected $subscription;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var integer
     */
    protected $reviews_count;

    /**
     * @var float
     */
    protected $rating;

    /**
     * @var array
     */
    protected $answers;

    /**
     * @return int
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getGoodsId(): ?int {
        return $this->goods_id;
    }

    /**
     * @return string
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getText(): ?string {
        return $this->text;
    }

    /**
     * @return int
     */
    public function getSubscription(): ?int {
        return $this->subscription;
    }

    /**
     * @return string
     */
    public function getStatus(): ?string {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getReviewsCount(): ?int {
        return $this->reviews_count;
    }

    /**
     * @return float
     */
    public function getRating(): ?float {
        return $this->rating;
    }

    /**
     * @return array
     */
    public function getAnswers(): ?array {
        return $this->answers;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'goods_id' => $this->goods_id,
            'name' => $this->name,
            'email' => $this->email,
            'text' => $this->text,
            'subscription' => $this->subscription,
            'status' => $this->status,
            'reviews_count' => $this->reviews_count,
            'rating' => $this->rating,
            'answers' => $this->answers,
        ];
    }
}
