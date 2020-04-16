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
        $this->users->findOrFail($followerId);
        $this->users->findOrFail($followingId);
        $this->followers->createFollower($followerId, $followingId);
        return response()->json(['status' => 'success', 'message' => 'Follower Created Successfully'], 201);
    }
}
