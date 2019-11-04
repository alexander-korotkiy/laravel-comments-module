<?php

namespace Deka\Comments\Application\Providers;

use Deka\Comments\Infrastructure\Interfaces\CommentsAnswerReadRepositoryInterface;
use Deka\Comments\Infrastructure\Interfaces\CommentsReadRepositoryInterface;
use Deka\Comments\Infrastructure\Interfaces\CommentsWriteRepositoryInterface;
use Deka\Comments\Infrastructure\Repositories\CommentsAnswerRUReadRepository;
use Deka\Comments\Infrastructure\Repositories\CommentsAnswerUAReadRepository;
use Deka\Comments\Infrastructure\Repositories\CommentsRUReadRepository;
use Deka\Comments\Infrastructure\Repositories\CommentsUAReadRepository;
use Deka\Common\Application\AbstractServiceProvider;

class CommentsServiceProvider extends AbstractServiceProvider
{
    protected $lang_repositories = [
        CommentsReadRepositoryInterface::class  => [
            'ru' => CommentsRUReadRepository::class,
            'ua' => CommentsUAReadRepository::class,
        ],
        CommentsAnswerReadRepositoryInterface::class  => [
            'ru' => CommentsAnswerRUReadRepository::class,
            'ua' => CommentsAnswerUAReadRepository::class,
        ]
    ];

    protected $migrationsPath = __DIR__ . '/../../Infrastructure/Migrations';

    protected $routesPath = __DIR__ . '/../../UI/Routes/api.php';
}
