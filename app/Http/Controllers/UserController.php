<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Repository\UserRepository;

class UserController extends Controller
{

    protected $users;
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function store(UserStoreRequest $request)
    {
        $request->validated();
        $this->users->create($request->all());
        return response()->json(['status' => 'User created successfully'], 201);
    }
}
