<?php

namespace Deka\Comments\Infrastructure\Repositories;

use Deka\Comments\Infrastructure\DTO\Comments;
use Deka\Comments\Infrastructure\DTO\CommentsAnswer;
use Deka\Comments\Infrastructure\Interfaces\CommentsReadRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use \Illuminate\Database\Query\Builder;

abstract class AbstractCommentsRepository implements CommentsReadRepositoryInterface {

    public function findOne(int $id): ?Comments {
        try {
            $comments = $this->getQuery()->where('gr.id', $id)->first();
        }catch (QueryException $exception){
            Log::error($exception->getMessage(), $exception->getTrace());
            $comments = null;
        }
        return $comments !== null ? new Comments($comments) : null;
    }

    public function findAll(int $goods_id): Collection {
        return $this->getQuery()->where('gr.goods_id', $goods_id)->orderBy('gr.created_at', 'DESC')->get()->map(function($comment) {
            $comment->answers = $this->getAnswerQuery()
                ->where('review_id', $comment->id)
                ->get()
                ->mapInto(CommentsAnswer::class)->map(function(CommentsAnswer $comments_answer) {
                    return $comments_answer->toArray();
                })->toArray();
            return $comment;
        })->mapInto(Comments::class);
    }
    
    public function store(Comments $comment) : int
    {
        $id = DB::table('goods_reviews')->insertGetId([
           'goods_id' => $comment->getGoodsId(),
           'name' => $comment->getName(),
           'email' => $comment->getEmail(),
           'text' => $comment->getText(),
           'subscription' => $comment->getSubscription(),
           'status' => $comment->getStatus(),
           'reviews_count' => $comment->getReviewsCount(),
           'created_at' => DB::raw('now()'),
           'updated_at' => DB::raw('now()'),
        ]);

        if ($id && $comment->getGoodsId()) {
            DB::table('goods_rating')->insert([
                'goods_id' => $comment->getGoodsId(),
                'rating' => $comment->getRating(),
                'review_id' => $id,
                'created_at' => DB::raw('now()'),
                'updated_at' => DB::raw('now()')
            ]);
        }

        return $id;
    }

    /**
     * @return Builder
     */
    private function getQuery() {
        return DB::table('goods_reviews AS gr')
            ->select('gr.id', 'gr.goods_id','gr.name', 'gr.email', 'gr.text', 'gr.subscription', 'gr.status', 'gr.reviews_count', 'grt.rating')
            ->leftJoin('goods_rating AS grt', 'grt.review_id', '=', 'gr.id');
    }

    /**
     * @return Builder
     */
    private function getAnswerQuery() {
        return DB::table('goods_review_answer AS gra')
            ->select('gra.id', 'gra.review_id', 'gra.user_id', 'gra.text');
    }

    public function count(): int {
        return DB::table('goods_reviews')->count();
    }
}
