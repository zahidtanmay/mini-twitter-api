<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory('App\Model\User')->create()->id;
        },
        'content' => $faker->realText(),
    ];
});
