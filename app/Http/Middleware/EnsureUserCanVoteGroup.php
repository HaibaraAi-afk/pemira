<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanVoteGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $group = $request->route("group");

        if ($group->year !== null && $group->year !== $user->year) {
            return redirect()->route("vote.organization", [
                "organization" => $group->organization->id,
            ]);
        } else if ($group->major !== null && $group->major !== $user->major) {
            return redirect()->route("vote.organization", [
                "organization" => $group->organization->id,
            ]);
        }

        return $next($request);
    }
}
