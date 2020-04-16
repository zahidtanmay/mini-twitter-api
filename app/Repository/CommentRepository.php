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
        $data['post_id'] = $id;
        $data['user_id'] = app('request')->get('auth')->id;
        return parent::create($data);
    }
}
