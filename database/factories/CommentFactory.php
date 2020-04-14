<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory('App\Model\User')->create()->id;
        },
        'post_id' => function(){
            return factory('App\Model\Post')->create()->id;
        },
        'content' => $faker->sentence,
    ];
});
