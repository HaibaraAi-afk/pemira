<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Group;
use App\Models\Organization;
use Illuminate\Http\Request;

class CandidateController extends Controller
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
    public function create()
    {
        //
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
    public function show(
        Organization $organization,
        Group $group,
        Candidate $candidate
    ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(
        Organization $organization,
        Group $group,
        Candidate $candidate
    ) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Organization $organization,
        Group $group,
        Candidate $candidate
    ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Organization $organization,
        Group $group,
        Candidate $candidate
    ) {
        //
    }
}
