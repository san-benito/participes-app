<?php

namespace App\Http\Middleware;

use Closure;

class CanManageObjective
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$role)
    {   
        $objId = $request->route()->parameter('objId');

        // Admin can access
        if ($request->user()->hasAnyRole(['admin'])) {
            return $next($request);
        }

        // Members can access
        if ($request->user()->isMemberObjective($objId)) {
            return $next($request);
        }

        // Any other, unauthorized
        abort(403, 'No autorizado');
    }
}
