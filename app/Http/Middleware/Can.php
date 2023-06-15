<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Can
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissions): Response
    {
        $permissions = explode(',', $permissions);
        foreach ($permissions as $permission) {
            if ($request->user()->can(trim($permission))) {
                return $next($request);
            }
        }

        abort(403);
    }
}
