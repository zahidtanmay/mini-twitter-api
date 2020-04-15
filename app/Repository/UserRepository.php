<?php
namespace App\Repository;

class UserRepository extends Repository
{
    public function model()
    {
        return 'App\Models\User';
    }

    public function create(array $data)
    {
        $data['password'] = app('hash')->make($data['password']);
        return parent::create($data);
    }
}
