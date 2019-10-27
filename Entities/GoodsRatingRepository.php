<?php

namespace Modules\Comments\Entities;

use Illuminate\Database\Eloquent\Model;

class GoodsRatingRepository extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'goods_rating';

    protected $fillable = [];
}
