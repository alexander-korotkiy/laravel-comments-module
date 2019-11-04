<?php

namespace Deka\Comments\Domain\Entity;

use Deka\Comments\Infrastructure\DTO\CommentsAnswer;

class CommentsAnswerEntity {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $review_id;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var string
     */
    private $text;

    /**
     * CommentsAnswerEntity constructor.
     * @param CommentsAnswer $comments_answer
     */
    public function __construct(CommentsAnswer $comments_answer) {
        $this->id = $comments_answer->getId();
        $this->review_id = $comments_answer->getReviewId();
        $this->user_id = $comments_answer->getUserId();
        $this->text = $comments_answer->getText();
    }

    /**
     * @param CommentsAnswer $comments_answer
     * @return CommentsAnswerEntity
     */
    public static function create(CommentsAnswer $comments_answer){
        return new self($comments_answer);
    }

    /**
     * @return array
     */
    public function getData(){
        return [
            'id' => $this->id,
            'review_id' => $this->review_id,
            'user_id' => $this->user_id,
            'text' => $this->text,
        ];
    }
}
