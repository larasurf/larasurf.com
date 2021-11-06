<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class BasicAuthByEnvironment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $environment = config('app.env');

        $username = config("auth.basic-auth.$environment.username");
        $password = config("auth.basic-auth.$environment.password");

        if ($username && $password && ($request->getUser() !== $username || $request->getPassword() !== $password)) {
            throw new UnauthorizedHttpException('Basic');
        }

        return $next($request);
    }
}
