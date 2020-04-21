<?php

namespace App\Repository;
use App\Repository\Repository;

class CommentRepository extends Repository
{
    public function model()
    {
        return 'App\Models\Comment';
    }

    public function createComment(array $data, $id)
    {
        $userId = app('request')->get('auth')->id;
        $data['post_id'] = $id;
        $data['user_id'] = $userId;
        $key = 'userDetails'.$userId;
        if(app('redis')->exists($key)){
            app('redis')->del($key);
        }
        return parent::create($data);
    }
}
