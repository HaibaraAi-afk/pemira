<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        $ktm = Storage::disk("public")->put("ktms", $request->file("ktm"));
        $verification = Storage::disk("public")->put(
            "verifications",
            $request->file("verification")
        );

        $user = $request->user();
        $user->verification()->create([
            "ktm" => $ktm,
            "verification" => $verification,
        ]);

        return redirect()->route("index");
    }
}
