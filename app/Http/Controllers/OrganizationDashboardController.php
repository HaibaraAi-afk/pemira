<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Inertia\Inertia;

class OrganizationDashboardController extends Controller
{
    public function dashboard(Organization $organization)
    {
        return Inertia::render("organizations/dashboard", [
            "organization" => $organization,
        ]);
    }
}
