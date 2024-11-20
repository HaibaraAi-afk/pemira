<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Organization;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VoteController extends Controller
{
    public function index()
    {
        return Inertia::render("vote/index");
    }

    public function organization(Request $request, Organization $organization)
    {
        // Cek apakah user sudah punya Ballot
        // - Jika belum, buat Ballot kosong
        $user = $request->user();
        $ballot = $user->ballot;
        if (!$ballot) {
            $ballot = $user->ballot()->create();
        }

        // Kalau butuh user pakai ini
        // $user = User::find($request->user_id);
        // return $user;

        // Kalau sudah selesai diganti ini
        // $user = $request->user();

        // Check apakah user sudah punya Ballot
        // Jika sudah punya Ballot
        if ($ballot) {
            // Ambil data BallotDetail paling akhir
            // Jika tidak, redirect ke route("vote.index")
            // - Ambil data Ballot dan BallotDetail paling akhir
            // - Jika belum ada data BallotDetail, redirect ke route("vote.group")
            //   dengan parameter group pertama dari organization ($oganization->firstGroup())
            if ($ballot->ballotDetails->isEmpty()) {
                return redirect()->route("vote.group", $organization->groups->first());
            }
            // - Jika sudah ada data BallotDetail
            //   - Ambil data group selanjutnya dari BallotDetail paling akhir
            $lastBallotDetail = $ballot->ballotDetails->last();
            $nextGroup = $lastBallotDetail->group->next();
            //   - Jika ada group selanjutnya, redirect ke route("vote.group") dengan parameter group tersebut
            if ($nextGroup) {
                return redirect()->route("vote.group", $nextGroup);
            }
            //   - Jika tidak, redirect ke route("vote.index")
            return redirect()->route("vote.index");
        }
    }

    public function ktm(Request $request, Organization $organization)
    {
        // return Inertia::render("vote/ktm");
    }

    public function storeKtm(Request $request, Organization $organization)
    {
        // Validasi parameter ktm
        $request->validate([
            'ktm' => [
                'required',
                'image',
                'mimes:png,jpg,jpeg',

            ]
        ]);
        // Ambil user dari request
        $user = $request->user();
        // Simpan gambar KTM ke storage folder /ktms
        $pathKtm = $request->file("ktm")->store("ktms");
        // Simpan path gambar KTM ke ballot user
        $user->ballot->update([
            "ktm" => $pathKtm,
            'ktm_is_verified' => true,
            'ktm_verified_at' => now(),
        ]);

        return redirect()->route("vote.verification");
    }

    public function verification(Request $request, Organization $organization)
    {
        // return Inertia::render("vote/verification");
    }

    public function storeVerification(
        Request $request,
        Organization $organization
    ) {
        // Validasi parameter verification
        // Ambil user dari request
        $request->validate([
            'verification' => [
                'required',
                'image',
                'mimes:png,jpg,jpeg',
            ]
        ]);
        $user = $request->user();
        // Simpan verification ke storage folder /verifications
        $pathVerification = $request->file("verification")->store("verifications");
        // Simpan path gambar verification ke ballot user
        $request->user()->ballot->update(["verification" => $pathVerification]);

        return redirect()->route("vote.group", $organization->groups->first());
    }

    public function group(Organization $organization, Group $group)
    {
        // return Inertia::render("vote/group")->with("nextGroup", $group->next());
    }

    public function storeGroup(
        Request $request,
        Organization $organization,
        Group $group
    ) {
        // Validasi parameter candidate_id
        $request->validate([
            'candidate_id' => 'required|exists:candidates,id',
        ]);
        // Tambahkan data BallotDetail dengan data tersebut
        $ballotDetail = $request->user()->ballot->ballotDetails()->create([
            'group_id' => $group->id,
            'candidate_id' => $request->input('candidate_id'),
        ]);
        $nextGroup = $group->next();
        // check if there is next group
        return redirect()->route("vote.group", ["group" => $nextGroup]);
        // if there is no next group
        return redirect()->route("vote.result");
    }

    public function result(Organization $organization)
    {
        // return Inertia::render("vote/result");
    }

    public function confirmResult(Request $request, Organization $organization)
    {
        // Update ballot user is_confirmed menjadi true dan confirmed_at menjadi now()
        $request->user()->ballot->update([
            'is_confirmed' => true,
            'confirmed_at' => now(),
        ]);
        return redirect()->route("index");
    }
}
