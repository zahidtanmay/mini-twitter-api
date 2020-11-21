<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory('App\Models\User')->create()->id;
        },
        'post_id' => function(){
            return factory('App\Models\Post')->create()->id;
        },
        'content' => $faker->sentence,
    ];
});
