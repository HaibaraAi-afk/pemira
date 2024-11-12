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
        return Inertia::render("admin/whitelists");
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
        return redirect(route("admin.whitelists.index"))
            ->with("flash.message", "Whitelist updated");
    }

    public function storeSingle(Request $request)
    {
        $request->validate(["npm" => "required"]);
        Whitelist::query()->firstOrCreate(["npm" => $request->npm]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $whitelist)
    {
        Whitelist::findOrFail($whitelist);
    }

    public function validate(Request $request)
    {
        $request->validate(["npm" => "required|exists:whitelists,npm"]);
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
