<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComitteeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $organization = $request->route('organization');
        if ($user->type !== 'admin' && $user->type !== 'committee') {
            return redirect()->route('index');
        }

        if ($user === 'committee' && $organization->major !== $user->major) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
