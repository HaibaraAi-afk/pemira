<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class CommitteeController extends Controller
{
    public function dashboard($organization)
    {
        return Inertia::render("organizations/dashboard", [
            "organization" => $organization,
        ]);
    }

    public function ballots($organization)
    {
        return Inertia::render("organizations/dashboard", [
            "organization" => $organization,
        ]);
    }
}
