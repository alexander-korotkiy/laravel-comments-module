<?php

namespace Deka\Comments\Domain\Services;

use Deka\Comments\Application\Services\Request\CreateNewComment;
use Deka\Comments\Domain\Entity\CommentsEntity;
use Deka\Comments\Infrastructure\DTO\Comments;
use Deka\Comments\Infrastructure\Interfaces\CommentsReadRepositoryInterface;
use Illuminate\Support\Collection;

class CommentsService {

    /**
     * @var CommentsReadRepositoryInterface
     */
    private $comments_repository;

    /**
     * CommentsService constructor.
     * @param CommentsReadRepositoryInterface $comments_repository
     */
    public function __construct(CommentsReadRepositoryInterface $comments_repository) {
        $this->comments_repository = $comments_repository;
    }

    /**
     * @param int $id
     * @return CommentsEntity|null
     */
    public function getCommentsById(int $id): ?CommentsEntity {
        $comments = $this->comments_repository->findOne($id);
        return $comments !== null ? CommentsEntity::create($comments) : null;
    }

    /**
     * @param int $goods_id
     * @return Collection
     */
    public function getComments(int $goods_id): Collection {
        return $this->comments_repository->findAll($goods_id)->mapInto(CommentsEntity::class);
    }

    /**
     * @return int
     */
    public function getCountComments(): int {
        return $this->comments_repository->count();
    }

    /**
     * @param CreateNewComment $request
     * @return int
     */
    public function createComment(CreateNewComment $request) : int {
        return $this->comments_repository->store(
            new Comments($request->toArray())
        );
    }
}
