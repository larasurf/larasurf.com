<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RedirectTrailingSlash
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        $uri = $request->getRequestUri();

        if (preg_match('/.+\/$/', $uri)) {
            return \Redirect::to(rtrim($uri, '/'), Response::HTTP_MOVED_PERMANENTLY);
        }

        return $next($request);
    }
}
