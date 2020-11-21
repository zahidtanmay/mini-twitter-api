<?php
namespace App\Repository;

class PostRepository extends Repository
{
    function model()
    {
        return 'App\Models\Post';
    }

    public function create(array $data)
    {
        $userId = app('request')->get('auth')->id;
        $data['user_id'] = $userId;
        return parent::create($data);
    }
}
