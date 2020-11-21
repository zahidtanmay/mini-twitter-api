<?php

namespace App\Http\Controllers;

use App\Repository\FollowerRepository;
use App\Repository\UserRepository;

class FollowerController extends Controller
{
    protected $followers;
    protected $users;

    public function __construct(UserRepository $users, FollowerRepository $followers)
    {
        $this->followers = $followers;
        $this->users = $users;
    }

    public function store($followerId, $followingId)
    {
        $this->users->findOrFail([$followerId, $followingId]);
        $this->followers->createFollower($followerId, $followingId);
        return response()->json(['status' => 'success', 'message' => 'Follower Created Successfully'], 201);
    }

    public function delete($id)
    {
        $this->followers->findOrFail($id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Successfully Unfollow'], 202);
    }
}
