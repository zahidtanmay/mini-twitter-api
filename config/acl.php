<?php
return [
    'classes' => [
        'App\Http\Controllers\PostController@update' => App\Http\Acls\PostAcl::class,
        'App\Http\Controllers\PostController@delete' => App\Http\Acls\PostAcl::class,
        'App\Http\Controllers\CommentController@update' => App\Http\Acls\CommentAcl::class,
        'App\Http\Controllers\CommentController@delete' => App\Http\Acls\CommentAcl::class,
    ],
    'models' => [
    'App\Http\Controllers\PostController@update' => App\Models\Post::class,
    'App\Http\Controllers\PostController@delete' => App\Models\Post::class,
    'App\Http\Controllers\CommentController@update' => App\Models\Comment::class,
    'App\Http\Controllers\CommentController@delete' => App\Models\Comment::class,
]
];
