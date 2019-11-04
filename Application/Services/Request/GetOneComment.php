<?php

namespace Deka\Comments\Application\Services\Request;

class GetOneComment {

    /**
     * @var int
     */
    private $id;

    /**
     * GetOneComments constructor.
     * @param int $id
     */
    public function __construct(int $id) {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }
}
