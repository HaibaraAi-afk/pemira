<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VoterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $organization = $request->route('organization');
        $user = $request->user();
        $group = $$request->route('group');
        if ($organization->major !== null && $organization->major !== $user->major) {
            return redirect()->route('index');
        }

        if ($organization->year !== null && $organization->year !== $user->year) {
            return redirect()->route('index');
        }

        if ($group->major !== null && $group->major !== $organization->major) {
            return redirect()->route('index');
        }
        if ($group->major !== null && $group->major !== $user->major) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
