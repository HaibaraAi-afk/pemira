<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Organization;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Organization $organization)
    {
        return Inertia::render("admin/organizations/groups/create", [
            "organization" => $organization,
            "new_ordering" => $organization->groups()->count() + 1,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Organization $organization, Group $group)
    {
        return Inertia::render("admin/organizations/groups/show", [
            "group" => $group->load("candidates"),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization, Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Organization $organization,
        Group $group
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization, Group $group)
    {
        //
    }
}
