<?php

namespace App\Traits;

use App\Models\User;
use Firebase\JWT\JWT;

trait JwtToken
{
    protected function jwt(User $user) {
        $payload = [
            'iss' => "lumen-jwt",
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + 24 * 7 * 60*60
        ];

        return JWT::encode($payload, env('JWT_SECRET'));
    }

}
