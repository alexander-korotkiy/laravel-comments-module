<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')
    ->middleware('api')
    ->namespace("Deka\Comments\UI\Controllers")
    ->group(function () {
        Route::get('/comments/', 'CommentsController@list');
        Route::get('/comments/goods/{id}', 'CommentsController@list')->where('goods_id', '\d+');
        Route::get('/comments/goods/{id}/info', 'CommentsController@info')->where('goods_id', '\d+');
        Route::post('/comments/new', 'CommentsController@store');
        Route::post('/comments/goods/{id}/new', 'CommentsController@store')->where('goods_id', '\d+');
    });
