<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class UserVerificationController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
        if ($user->verification !== null) {
            return redirect()->route("index");
        }

        return Inertia::render("vote/verification");
    }

    public function store(Request $request)
    {
        $request->validate([
            "ktm" => "required|image",
            "verification" => "required|image",
        ]);

        $user = $request->user();
        $user->verification()->create([
            "ktm" => $request->file("ktm")->store("ktms"),
            "verification" => $request->file("verification")->store("verifications"),
        ]);

        return redirect()->route("index");
    }
}
