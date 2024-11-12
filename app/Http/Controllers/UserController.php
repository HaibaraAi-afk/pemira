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
        return Inertia::render("users/create", [
            "type" => $request->input("type", "admin"),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'npm' => 'required',
            'org_code' => 'required',
            'type' => 'required|in:admin,committee,voter',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'npm' => $request->input('npm'),
            'org_code' => $request->input('org_code'),
            'type' => $request->input('type'),
            "gen" => substr($request->input("npm"), 0, 2),
        ]);

        Whitelist::query()->firstOrCreate(["npm" => $request->input("npm")]);

        return redirect(route("users.index", ["type" => $user->type]))
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
        return Inertia::render("users/edit", ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'npm' => 'required',
            'org_code' => 'required',
            'type' => 'required|in:admin,committee,voter',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'npm' => $request->input('npm'),
            'org_code' => $request->input('org_code'),
            'type' => $request->input('type')
        ]);

        Whitelist::query()->firstOrCreate(["npm" => $request->input("npm")]);

        return redirect(route("users.index", ["type" => $user->type]))
            ->with("flash.message", "User has been updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route("users.index", ["type" => $user->type]))
            ->with("flash.message", "User {$user->name} has been deleted.");
    }
}
