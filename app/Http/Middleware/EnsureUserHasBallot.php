<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasBallot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $organization = $request->route("organization");
        $ballot = $user->ballot()
            ->where("organization_id", $organization->id)
            ->first();

        if (!$ballot) {
            return redirect()->route("index");
        }

        if ($ballot->is_confirmed) {
            return redirect()->route("index")
                ->with("flash.message", "Oops! sepertinya kamu sudah melakukan pemilihan untuk organisasi ini 😅")
                ->with("flash.type", "destructive");
        }

        return $next($request);
    }
}
