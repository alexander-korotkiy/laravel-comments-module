<?php

namespace Deka\Comments\Infrastructure\Interfaces;

use Deka\Comments\Infrastructure\DTO\Comments;
use Illuminate\Support\Collection;

interface CommentsReadRepositoryInterface
{

    public function findOne(int $id) : ?Comments;

    public function findAll(int $goods_id) : Collection;

    public function count() : int;

    public function store(Comments $comment) : int;

}
