<?php

namespace Illuminate\Http\Middleware;

use Closure;

class FrameGuard
{
    /**
     * Handle the given request and get the response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Content-Type','text/html; charset=UTF-8');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN', true);

        return $response;
    }
}
