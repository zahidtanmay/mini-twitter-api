<?php

namespace App\Repository;

class FollowerRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Follower';
    }

    public function createFollower($followerId, $followingId)
    {
        $data['user_id'] = $followingId;
        $data['follower_id'] = $followerId;
        return parent::create($data);
    }
}
