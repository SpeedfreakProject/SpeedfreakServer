<?php

namespace Speedfreak\Http\Middleware;

use Closure;

class AutoXML
{
    /**
     * Routes to ignore.
     *
     * @var array
     */
    protected $except = [
        'speedfreak/engine/server/infoui'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        foreach($this->except as $url) {
            if ($request->is($url)) return $next($request);
        }

        $response = $next($request);
        $response->header('Content-Type', 'application/xml');

        return $response;
    }
}
