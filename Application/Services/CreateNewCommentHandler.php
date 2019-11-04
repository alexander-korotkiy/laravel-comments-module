<?php

namespace Deka\Comments\Application\Services;


use Deka\Comments\Application\Services\Request\CreateNewComment;
use Deka\Comments\Domain\Entity\CommentsEntity;
use Illuminate\Support\Collection;
use Deka\Comments\Domain\Services\CommentsService;

class CreateNewCommentHandler
{

    /**
     * @var CommentsService
     */
    private $comments_service;

    /**
     * GetCommentsHandler constructor.
     * @param CommentsService $comments_service
     */
    public function __construct(CommentsService $comments_service)
    {
        $this->comments_service = $comments_service;
    }

    public function handle(CreateNewComment $request)
    {
        return $this->comments_service->createComment($request);
//        return Collection::make([
//            'status' => (bool)$comment_id
//        ]);
    }
}
