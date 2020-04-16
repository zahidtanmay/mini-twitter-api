<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Repository\UserRepository;

class UserController extends Controller
{

    protected $user;
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function show($id){
        return $this->user->with(['posts', 'followers', 'following'])->find($id);
    }

    public function store(UserCreateRequest $request)
    {
        $this->user->create($request->all());
        return response()->json(['status' => 'success', 'message' => 'User Created Successfully'], 201);
    }
}
