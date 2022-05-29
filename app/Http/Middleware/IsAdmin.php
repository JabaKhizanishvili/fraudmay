<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;

class IsAdmin extends Middleware
{


    public function handle($request, Closure $next, ...$guards)
    {
        if (auth()->user()->is_admin) {
            return $next($request);
        } else {
            throw new NotFoundHttpException();
        }
    }
}
