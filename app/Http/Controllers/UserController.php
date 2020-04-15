<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Repository\UserRepository;

class UserController extends Controller
{

    protected $users;
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function store(UserCreateRequest $request)
    {
        $request->validated();
        $this->users->create($request->all());
        return response()->json(['status' => 'User created successfully'], 201);
    }
}
