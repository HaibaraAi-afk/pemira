<?php

namespace App\Http\Controllers;

use App\Models\Ballot;
use App\Models\BallotDetail;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class RecapController extends Controller
{
    public function index(Organization $organization)
    {
        return Inertia::render("recap/confirmation", [
            "organization" => $organization,
        ]);
    }

    public function reset(Organization $organization)
    {
        $organization->ballots()
            ->where("is_confirmed", 1)
            ->update([
                "is_verified" => null,
                "verified_at" => null,
            ]);

        return redirect()->route("organizations.recap.validate", [
            "organization" => $organization->id,
        ]);
    }

    public function validate(Organization $organization)
    {
        $next = $organization->ballots()
            ->where("is_confirmed", 1)
            ->whereNotNull("confirmed_at")
            ->where("is_verified", null)
            ->where("verified_at", null)
            ->orderBy("confirmed_at", "asc")
            ->first();

        if ($next) {
            return Inertia::render("recap/validate", [
                "organization" => $organization,
                "ballot" => $next,
                "user" => $next->user,
                "verification" => $next->user->verification,
            ]);
        }

        return redirect()->route("organizations.recap.result", [
            "organization" => $organization->id,
        ]);
    }

    public function validateStore(Organization $organization, Request $request)
    {
        $request->validate([
            "ballot_id" => "required|exists:ballots,id",
            "verified" => "required|boolean",
        ]);

        Ballot::query()
            ->find($request->ballot_id)
            ->update([
                "is_verified" => $request->verified,
                "verified_at" => now(),
            ]);

        return redirect()->route("organizations.recap.validate", [
            "organization" => $organization->id,
        ]);
    }

    public function result(Organization $organization)
    {
        $groups = $organization->groups->load("candidates");

        foreach ($groups as &$group) {
            $group->candidates->each(function ($candidate) {
                $candidate->votes = BallotDetail::query()
                    ->where("candidate_id", $candidate->id)
                    ->whereHas("ballot", function ($query) {
                        $query->where("is_verified", true);
                    })
                    ->count();
            });
        }

        $groups = $groups->toArray();
        foreach ($groups as &$group) {
            $group["candidates"] = collect($group["candidates"])
                ->sortByDesc("votes")
                ->values()
                ->all();
        }

        $ballots = $organization->ballots()->where("is_confirmed", true)
            ->count();
        $verified_ballots = $organization->ballots()
            ->where("is_confirmed", true)
            ->where("is_verified", true)
            ->count();

        return Inertia::render("recap/result", [
            "organization" => $organization,
            "groups" => $groups,
            "ballots" => $ballots,
            "ballots_verified" => $verified_ballots,
        ]);
    }
}
