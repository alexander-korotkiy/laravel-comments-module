<?php

namespace Deka\Comments\Application\Services;


use Deka\Comments\Application\Services\Request\GetCommentsInfo;
use Deka\Comments\Domain\Entity\CommentsEntity;
use Illuminate\Support\Collection;
use Deka\Comments\Domain\Services\CommentsService;

class GetCommentsInfoHandler
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

    public function handle(GetCommentsInfo $request)
    {
        $items = $this->comments_service->getComments($request->getGoodsId())->map(function (CommentsEntity $comments) {
            return $comments->getData();
        });

        if (!$request->getGoodsId() || !$items->count()) {
            return Collection::make([]);
        }

        return Collection::make([
            'rating' => array_sum($items->map(function($comment) {
                    return $comment['rating'];
                })->toArray()) / $items->count(),
            'reviews_count' => $items->count()
        ]);
    }
}
