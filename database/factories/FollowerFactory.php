<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Follower;
use Faker\Generator as Faker;

$factory->define(Follower::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory('App\Model\User')->create()->id;
        },
        'follower_id' => function(){
            return factory('App\Model\User')->create()->id;
        },
    ];
});
