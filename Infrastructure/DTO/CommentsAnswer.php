<?php

namespace Deka\Comments\Infrastructure\DTO;

use Deka\Common\Helpers\PropertySetter;

class CommentsAnswer extends PropertySetter {

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $review_id;

    /**
     * @var integer
     */
    protected $user_id;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return int
     */
    public function getId(): ?int {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getReviewId(): ?int {
        return $this->review_id;
    }

    /**
     * @return int
     */
    public function getUserId(): ?int {
        return $this->user_id;
    }

    /**
     * @return string
     */
    public function getText(): ?string {
        return $this->text;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'review_id' => $this->review_id,
            'user_id' => $this->user_id,
            'text' => $this->text
        ];
    }
}
