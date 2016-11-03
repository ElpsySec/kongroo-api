<?php

$app->group(['prefix' => 'v1'], function() use ($app) {
    $app->get('/articles', [
        'uses' => '\App\Http\Controllers\Article\ArticleController@index',
        'as' => 'api.base.article.index'
    ]);
    $app->get('/articles/{article}', [
        'uses' => '\App\Http\Controllers\Article\ArticleController@show',
        'as' => 'api.base.article.show'
    ]);
});

$app->group(['prefix' => 'v1'], function() use ($app) {
    $app->get('/tags', [
        'uses' => '\App\Http\Controllers\Tag\TagController@index',
        'as' => 'api.base.tag.index'
    ]);
    $app->get('/tags/{tag}', [
        'uses' => '\App\Http\Controllers\Article\TagController@show',
        'as' => 'api.base.tag.show'
    ]);
});