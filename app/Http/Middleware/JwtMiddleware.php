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
        $requestedRoute = $request->route()[1]['uses'];
        $exceptRoute = ["App\Http\Controllers\UserController@show", "App\Http\Controllers\PostController@index"];
        if(!$token) {
            if ($request->getMethod() === "GET" && in_array($requestedRoute, $exceptRoute)) {
                $request['auth'] = false;
                return $next($request);
            } else {
                throw new AuthException("Token not provided");
            }
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
