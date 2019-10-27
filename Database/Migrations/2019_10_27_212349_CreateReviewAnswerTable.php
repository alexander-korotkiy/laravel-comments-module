<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewAnswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_review_answer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('user_id');
            $table->text('text');
            $table->timestamps();
        });

        Schema::table('goods_review_answer', function(Blueprint $table) {
            $table->foreign('review_id')->references('id')->on('goods_reviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods_review_answer', function (Blueprint $table) {
            $table->dropForeign(['review_id']);
        });
        Schema::dropIfExists('goods_review_answer');
    }
}
