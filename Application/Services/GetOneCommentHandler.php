<?php
/**
 * Created by PhpStorm.
 * User: snipe
 * Date: 8/18/19
 * Time: 5:37 PM
 */

namespace Deka\Comments\Application\Services;

use Deka\Comments\Domain\Services\CommentsService;
use Deka\Comments\Application\Services\Request\GetOneComment;

class GetOneCommentHandler {

    /**
     * @var CommentsService
     */
    private $comments_service;

    /**
     * GetOneCommentHandler constructor.
     * @param CommentsService $comments_service
     */
    public function __construct(CommentsService $comments_service) {
        $this->comments_service = $comments_service;
    }

    public function handle(GetOneComment $request){
        $comment = $this->comments_service->getCommentsById($request->getId());
        return $comment !== null ? $comment->getData() : [];
    }

}
