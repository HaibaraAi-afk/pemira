<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Whitelist;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->input("type", "admin");
        return Inertia::render("admin/users", [
            "type" => $type,
            "users" => User::query()
                ->where("type", $type)
                ->orderBy("npm")
                ->cursorPaginate(10),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return Inertia::render("admin/users/create", [
            "type" => $request->input("type", "admin"),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "type" => "required|in:admin,committee,voter",
            "name" => "required",
            "email" => "required",
            "npm" => "required",
        ]);

        $npm = $request->input("npm");
        $user = User::create([
            "npm" => $npm,
            "email" => $request->input("email"),
            "year" => substr($npm, 0, 2),
            "major" => substr($npm, 4, 2),
            "name" => $request->input("name"),
            "type" => $request->input("type"),
        ]);

        Whitelist::query()->firstOrCreate(["npm" => $request->input("npm")]);

        return redirect(route("admin.users.index", ["type" => $user->type]))
            ->with("flash.message", "User has been added.");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return Inertia::render("admin/users/edit", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "type" => "required|in:admin,committee,voter",
            "npm" => "required",
            "email" => "required",
            "name" => "required",
        ]);

        $npm = $request->input("npm");
        $user->update([
            "npm" => $npm,
            "email" => $request->input("email"),
            "year" => substr($npm, 0, 2),
            "major" => substr($npm, 4, 2),
            "name" => $request->input("name"),
            "type" => $request->input("type"),
        ]);

        Whitelist::query()->firstOrCreate(["npm" => $request->input("npm")]);

        return redirect(route("admin.users.index", ["type" => $user->type]))
            ->with("flash.message", "User has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route("admin.users.index", ["type" => $user->type]))
            ->with("flash.message", "User {$user->name} has been deleted.");
    }
}
