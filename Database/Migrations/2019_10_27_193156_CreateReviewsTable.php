<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_reviews', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->unsignedBigInteger('goods_id')->index();
           $table->string('name', 255);
           $table->string('email', 255);
           $table->text('text');
           $table->smallInteger('subscription');
           $table->string('status', 255);
           $table->integer('reviews_count');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_reviews');
    }
}
