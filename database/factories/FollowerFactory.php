<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Follower;
use Faker\Generator as Faker;

$factory->define(Follower::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory('App\Models\User')->create()->id;
        },
        'follower_id' => function(){
            return factory('App\Models\User')->create()->id;
        },
    ];
});
