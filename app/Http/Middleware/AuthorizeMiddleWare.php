<?php

namespace App\Http\Middleware;

use App\Exceptions\RepositoryException;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Model;

class AuthorizeMiddleWare
{
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }

    public function handle($request, Closure $next)
    {
        $currentRoute = app('request')->route()[1]['uses'] ?? "";
        $id = app('request')->route()[2]['id'] ?? null;

        if($currentRoute) {
            $models = config('acl.models');
            if (isset($models[$currentRoute])) {
                $model = $models[$currentRoute];
                $model = $this->app->make($model);
                if (!$model instanceof Model)
                    throw new RepositoryException("Class {$model} must be an instance of Illuminate\\Database\\Eloquent\\Model");
                $data = $model->findOrFail($id);
                if ($data['user_id'] === $request->get('auth')->id){
                    return $next($request);
                } else {
                    throw new AuthorizationException('You are not authorized to perform this action.');
                }
            }

        }

        return $next($request);
    }
}
