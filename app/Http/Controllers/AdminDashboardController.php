<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use App\Models\Whitelist;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $whitelists = Whitelist::count();
        $voters = User::where("type", "voter")->count();
        $committees = User::where("type", "committee")->count();
        $admins = User::where("type", "admin")->count();
        $organizations = Organization::orderBy("ordering")->get();

        return Inertia::render("admin/dashboard", [
            "whitelists" => $whitelists,
            "voters" => $voters,
            "committees" => $committees,
            "admins" => $admins,
            "organizations" => $organizations,
        ]);
    }
}
