<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render("admin/users", [
            "users" => User::query()->where("type", "committee")->get(),
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("users/create");
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
            'type' => 'required',
        ]);
        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'npm' => $request->input('npm'),
            'org_code' => $request->input('org_code'),
            'type' => $request->input('type')
        ]);

        return response()->json(['user' => $user], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User Tidak Ditemukan'], 404);
        }

        return response()->json($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User Tidak Ditemukan'], 404);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'npm' => 'required',
            'org_code' => 'required',
            'type' => 'required',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'npm' => $request->input('npm'),
            'org_code' => $request->input('org_code'),
            'type' => $request->input('type')
        ]);

        return response()->json(['message' => 'User Berhasil Diupdate']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User Tidak Ditemukan'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User Berhasil Dihapus'], 200);
    }
}
