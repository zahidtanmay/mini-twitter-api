<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api'], function () use ($router){
    $router->post('/users', 'UserController@store');
    $router->post('/auth/login', 'AuthController@authenticate');

    $router->group(['middleware' => 'jwt.auth'], function () use ($router) {

        $router->group(['prefix' => '/users'], function () use ($router){
            $router->get('/{id}', 'UserController@show');
            $router->post('/{followerId}/{followingId}', 'FollowerController@store');
            $router->delete('/unfollow/{id}', 'FollowerController@delete');
        });

        $router->group(['prefix' => '/posts'], function () use ($router) {
            $router->get('/', 'PostController@index');
            $router->post('/', 'PostController@store');
            $router->get('/{id}', 'PostController@show');
            $router->patch('/{id}', 'PostController@update');
            $router->delete('/{id}', 'PostController@delete');
            $router->post('/{id}/comments', 'CommentController@store');
            $router->patch('/comments/{id}', 'CommentController@update');
            $router->delete('/comments/{id}', 'CommentController@delete');
        });

    });
});
