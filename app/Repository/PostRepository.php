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
        $data['user_id'] = app('request')->get('auth')->id;
        return parent::create($data);
    }
}
