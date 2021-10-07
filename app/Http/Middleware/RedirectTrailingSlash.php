<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Redirect;

class RedirectTrailingSlash
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
        $uri = $request->getRequestUri();

        if (preg_match('/.+\/$/', $uri))
        {
            return Redirect::to(rtrim($uri, '/'), Response::HTTP_MOVED_PERMANENTLY);
        }

        return $next($request);
    }
}
