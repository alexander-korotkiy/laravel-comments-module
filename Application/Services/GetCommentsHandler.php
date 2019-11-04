<?php

namespace Deka\Comments\Application\Services;


use Deka\Comments\Application\Services\Request\GetComments;
use Deka\Comments\Domain\Entity\CommentsEntity;
use Illuminate\Support\Collection;
use Deka\Comments\Domain\Services\CommentsService;

class GetCommentsHandler
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

    public function handle(GetComments $request)
    {
        $items = $this->comments_service->getComments($request->getGoodsId())->map(function (CommentsEntity $comments) {
            return $comments->getData();
        });

        if (!$items->count()) {
            return Collection::make([]);
        }

        if ($request->getGoodsId()) {
            return Collection::make([
                'items' => $items,
                'rating' => array_sum($items->map(function($comment) {
                        return $comment['rating'];
                    })->toArray()) / $items->count(),
                'reviews_count' => $items->count()
            ]);
        }

        return Collection::make([
            'items' => $items
        ]);
    }
}
