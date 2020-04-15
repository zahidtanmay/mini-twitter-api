<?php

namespace App\Http\Middleware;

use App\Repository\UserRepository;
use Closure;
use Exception;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use App\Exceptions\AuthException;

class JwtMiddleware
{
    protected $users;
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function handle($request, Closure $next, $guard = null)
    {
        $token = $request->get('token', $request->bearerToken());

        if(!$token) {
            $request['auth'] = false;
            return $next($request);
//            return response()->json(['error' => 'Token not provided.'], 401);
        }

        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            throw new ExpiredException("Provided token has been expired");
        } catch(Exception $e) {
            throw new AuthException("Invalid token provided");
        }

        $user = $this->users->find($credentials->sub);
        $request['auth'] = $user;

        return $next($request);
    }
}
