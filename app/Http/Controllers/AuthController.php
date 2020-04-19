<?php

namespace App\Http\Controllers;

use App\Exceptions\AuthException;
use App\Http\Requests\UserLogInRequest;
use App\Repository\UserRepository;
use App\Traits\JwtToken;

class AuthController extends Controller
{
    use JwtToken;
    protected $users;

    public function __construct(UserRepository $users) {
        $this->users = $users;
    }

    public function authenticate(UserLogInRequest $request) {
        $request->validated();
        $user = $this->users->findBy('email', $request->get('email'));
        if (!$user) {
            throw new AuthException("These credentials do not match our records.");
        }

        if (app('hash')->check($request->get('password'), $user->password)) {
            return response()->json([
                'status' => 'success',
                'token' => $this->jwt($user),
                'user' => $user
            ], 200);
        }
        throw new AuthException('Password is incorrect.');
    }
}
