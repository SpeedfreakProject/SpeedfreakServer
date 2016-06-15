<?php

namespace Speedfreak\Http\Middleware;

use Closure;

class LowercaseRoutes
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!ctype_lower(preg_replace('/[^A-Za-z]/', '', $request->path())) && $request->path() != '/') {
            $new_route = str_replace($request->path(), strtolower($request->path()), $request->fullUrl());
            
            return redirect($new_route, 301);
        }

        return $next($request);
    }
}
