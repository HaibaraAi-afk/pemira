<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrganizationDashboardController extends Controller
{
    public function dashboard(Organization $organization)
    {
        $organization->loadCount("ballots");
        $ballots = $organization->ballots()->with("user")
            ->where("is_confirmed", 1)
            ->cursorPaginate(5);

        return Inertia::render("organizations/dashboard", [
            "organization" => $organization,
            "ballots" => $ballots,
        ]);
    }

    public function open(Organization $organization, Request $request)
    {
        $organization->update(["is_open" => true]);
        return redirect()->route("organizations.dashboard", [
            "organization" => $organization,
        ]);
    }

    public function close(Organization $organization)
    {
        $organization->update(["is_open" => false]);
        return redirect()->route("organizations.dashboard", [
            "organization" => $organization,
        ]);
    }

    public function reset(Organization $organization)
    {
        $organization->ballotDetails()->delete();
        $organization->ballots()->delete();
        return redirect()->route("organizations.dashboard", [
            "organization" => $organization,
        ]);
    }
}
