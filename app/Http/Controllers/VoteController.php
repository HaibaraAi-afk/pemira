<?php

namespace App\Http\Controllers;

use App\Models\BallotDetail;
use App\Models\Group;
use App\Models\Organization;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VoteController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $user->load("verification");

        $organizations = Organization::query()
            ->where(function (Builder $query) use ($user) {
                $query->where("major", null)
                    ->orWhere("major", $user->major);
            })
            ->where("is_open", true)
            ->get();

        return Inertia::render("vote/index", [
            "verification" => $user->verification,
            "organizations" => $organizations,
        ]);
    }

    public function organization(Request $request, Organization $organization)
    {
        $user = $request->user();
        $ballot = $user->ballot()
            ->where("organization_id", $organization->id)
            ->first();

        if (!$ballot) {
            $user->ballot()->create([
                "organization_id" => $organization->id,
            ]);
        }

        $first = $organization->firstGroup($user->year, $user->major);

        return redirect()->route("vote.group", [
            "organization" => $organization->id,
            "group" => $first->id
        ]);
    }

    public function group(
        Organization $organization,
        Group $group,
        Request $request
    ) {
        $user = $request->user();
        $ballot = $user->ballot()
            ->where("organization_id", $organization->id)
            ->first();
        $ballotDetail = $ballot->details()
            ->where("group_id", $group->id)
            ->first();

        return Inertia::render("vote/group", [
            "organization" => $organization,
            "group" => $group,
            "candidates" => $group->candidates,
            "ballotDetail" => $ballotDetail,
        ]);
    }

    public function groupPrevious(
        Organization $organization,
        Group $group,
        Request $request
    ) {
        $user = $request->user();
        $previousGroup = $group->prev($user->year, $user->major);
        if ($previousGroup) {
            return redirect()->route("vote.group", [
                "organization" => $organization->id,
                "group" => $previousGroup->id,
            ]);
        }

        return redirect()->route("index");
    }

    public function storeGroup(
        Request $request,
        Organization $organization,
        Group $group
    ) {
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
        ]);

        $user = $request->user();
        $ballot = $user->ballot()
            ->where("organization_id", $organization->id)
            ->first();

        $detail = $ballot->details()
            ->where("group_id", $group->id)
            ->first();

        if ($detail) {
            $detail->update([
                "candidate_id" => $request->candidate_id,
            ]);
        } else {
            $ballot->details()->create([
                "organization_id" => $organization->id,
                "group_id" => $group->id,
                "candidate_id" => $request->candidate_id,
            ]);
        }

        $nextGroup = $group->next($user->year, $user->major);

        if (!$nextGroup) {
            return redirect()->route("vote.result", [
                "organization" => $organization->id,
            ]);
        }

        return redirect()->route("vote.group", [
            "organization" => $organization->id,
            "group" => $nextGroup,
        ]);
    }

    public function result(Organization $organization, Request $request)
    {
        $user = $request->user();
        $ballot = $user->ballot()
            ->where("organization_id", $organization->id)
            ->first();
        $details = $ballot->details()
            ->with("group", "candidate")
            ->get();

        return Inertia::render("vote/result", [
            "organization" => $organization,
            "details" => $details
        ]);
    }

    public function confirmResult(Request $request, Organization $organization)
    {
        $user = $request->user();
        $ballot = $user->ballot()
            ->where("organization_id", $organization->id)
            ->first();

        $ballot->update([
            "is_confirmed" => 1,
            "confirmed_at" => now(),
        ]);

        return redirect()
            ->route("index")
            ->with("flash.message", "Terima kasih telah berpartisipasi! 🤩");
    }
}
