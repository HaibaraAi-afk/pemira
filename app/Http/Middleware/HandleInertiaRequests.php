<?php

namespace App\Http\Middleware;

use App\Models\Group;
use App\Models\Organization;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        if ($request->route()->getName() === "auth.callback") {
            return [];
        }

        $organization = null;
        $group = null;

        if ($request->route("organization")) {
            $organization = $request->route("organization");
            if (!($organization instanceof Organization)) {
                $organization = Organization::find($organization);
            }
        }
        if ($request->route("group")) {
            $group = $request->route("group");
            if (!($group instanceof Group)) {
                $group = Group::find($group);
            }
        }

        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            "flash" => $request->session()->get("flash.message") ? [
                "message" => $request->session()->get("flash.message"),
                "type" => $request->session()->get("flash.type", "default"),
            ] : null,
            "organizations" => $request->user()?->type === "admin" ?
                Organization::orderBy("ordering")->get() :
                null,
            "organization" => $organization,
            "group" => $group,
        ];
    }
}
