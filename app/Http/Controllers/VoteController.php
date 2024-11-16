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

        // Kalau butuh user pakai ini
        // $user = User::find($request->user_id);
        // return $user;

        // Kalau sudah selesai diganti ini
        // $user = $request->user();

        // Check apakah user sudah punya Ballot
        // Jika sudah punya Ballot
        // - Ambil data Ballot dan BallotDetail paling akhir
        // - Jika belum ada data BallotDetail, redirect ke route("vote.group")
        //   dengan parameter group pertama dari organization ($oganization->firstGroup())
        // - Jika sudah ada data BallotDetail
        //   - Ambil data group selanjutnya dari BallotDetail paling akhir
        //   - Jika ada group selanjutnya, redirect ke route("vote.group") dengan parameter group tersebut
        //   - Jika tidak, redirect ke route("vote.index")
    }

    public function ktm(Request $request, Organization $organization)
    {
        // return Inertia::render("vote/ktm");
    }

    public function storeKtm(Request $request, Organization $organization)
    {
        // Validasi parameter ktm
        // Simpan gambar KTM ke storage folder /ktms
        // Simpan path gambar KTM ke ballot user
        // $request->user()->ballot->update(["ktm" => $pathKtm]);

        // return redirect()->route("vote.verification");
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
        // Simpan verification ke storage folder /verifications
        // Simpan path gambar verification ke ballot user

        // return redirect()->route("vote.group", $organization->groups->first());
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
        // Tambahkan data BallotDetail dengan data tersebut

        // $nextGroup = $group->next();
        // check if there is next group
        // return redirect()->route("vote.group", ["group" => $nextGroup]);
        // if there is no next group
        // return redirect()->route("vote.result");
    }

    public function result(Organization $organization)
    {
        // return Inertia::render("vote/result");
    }

    public function confirmResult(Request $request, Organization $organization)
    {
        // Update ballot user is_confirmed menjadi true dan confirmed_at menjadi now()
        // return redirect()->route("index");
    }
}
