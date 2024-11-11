<?php

namespace App\Http\Controllers;

use App\Models\Whitelist;
use Illuminate\Http\Request;
use Inertia\Inertia;

class WhitelistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render("admin/whitelists", [
            "whitelists" => Whitelist::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render("whitelists/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(Whitelist::query()->with('user')->get());
        $request->validate([
            'whitelists' => 'required',
        ]);
        $whitelist = preg_split("/\r\n|\n|\r/", $request->whitelists);
        Whitelist::query()->whereDoesntHave('user')->delete();
        Whitelist::query()->whereHas('user', function ($query) {
            $query->where('type', 'voter');
        })->delete();
        foreach ($whitelist as $npm) {
            Whitelist::create([
                'npm' => $npm,
            ]);
        }
        return response()->json(['whitelist' => $whitelist], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Whitelist $whitelist)
    {
        return response()->json($whitelist, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Whitelist $whitelist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Whitelist $whitelist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Whitelist $whitelist)
    {
        //
    }
}
