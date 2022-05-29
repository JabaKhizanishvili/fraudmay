<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return locale_route('login');
        }
    }
    public function handle($request, Closure $next, ...$guards)
    {
        if (auth()->user()) {
            if (auth()->user()->is_admin || auth()->user()->is_moderator) {
                return $next($request);
            } else {
                return redirect()->route('client.home.index');
            }
        } else {
            return redirect(locale_route('loginView'));
        }

    }
}
