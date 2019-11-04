<?php

namespace Deka\Comments\Domain\Entity;

use Deka\Comments\Infrastructure\DTO\Comments;

class CommentsEntity {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
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
     * @var integer
     */
    private $subscription;

    /**
     * @var string
     */
    private $status;

    /**
     * @var integer
     */
    private $reviews_count;

    /**
     * @var float
     */
    private $rating;

    /**
     * @var array
     */
    private $answers;

    /**
     * CommentsEntity constructor.
     * @param Comments $comments
     */
    public function __construct(Comments $comments) {
        $this->id = $comments->getId();
        $this->goods_id = $comments->getGoodsId();
        $this->name = $comments->getName();
        $this->email = $comments->getEmail();
        $this->text = $comments->getText();
        $this->subscription = $comments->getSubscription();
        $this->status = $comments->getStatus();
        $this->reviews_count = $comments->getReviewsCount();
        $this->rating = $comments->getRating();
        $this->answers = $comments->getAnswers();
    }

    /**
     * @param Comments $comments
     * @return CommentsEntity
     */
    public static function create(Comments $comments){
        return new self($comments);
    }

    /**
     * @return array
     */
    public function getData(){
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
            'answers' => $this->answers
        ];
    }
}
