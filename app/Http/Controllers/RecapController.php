<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class RecapController extends Controller
{
    /**
     * Halaman pertama ketika ingin melakukan rekapitulasi, menampilkan data
     * organisasi, dan tombol mulai rekapitulasi. Jika organisasi sudah
     * melakukan rekapitulasi sebelumnya, maka akan ada tombol untuk melihat
     * hasil rekapitulasi sebelumnya dan tombol untuk mengulang proses
     * rekapitulasi.
     */
    public function index(Organization $organization)
    {
        $hasPreviousRecap = $organization->ballots()->whereNotNull('verified_at')->exists();

        return view('recap.index', compact('organization', 'hasPreviousRecap'));
    }

    /**
     * Fungsi untuk memulai proses rekapitulasi.
     * 
     * Jika status semua ballots di * organisasi sudah selesai (is_verified = 1 
     * & verified_at != null), maka * dianggap mengulang proses rekapitulasi
     * dimana akan mengupdate semua * status ballots menjadi (is_verified = 0 
     * & verified_at = null).
     * 
     * Redirect user ke route organizations.recap.ballots.
     */


    public function start(Organization $organization)
    {
        //$allVerified = $organization->ballots()->where('is_verified', 1)->exists();
        $allVerified = $organization->ballots()->where('is_verified', 1)->whereNotNull('verified_at')->count() === $organization->ballots()->count();


        if ($allVerified) {
            $organization->ballots()->update([
                'is_verified' => 0,
                'verified_at' => null,
            ]);
        }

        return redirect()->route('organizations.recap.ballots', ['organization' => $organization->code]);
    }


    /**
     * Halaman untuk menampilkan data ballot pertama atau selanjutnya untuk
     * diverifikasi.
     *  
     * Ambil data ballot yang terkonfirmasi (is_confirmed = 1 
     * & confirmed_at != null) dan belum diverifikasi (is_verified = 0 &
     * verified_at = null), urutkan berdasarkan confirmed_at asc (yang 
     * konfirmasi lebih awal didahulukan)
     * 
     * Jika tidak ada ballot yang memenuhi kriteria di atas, maka redirect ke 
     * organizations.recap.result.
     * 
     * return biasa aja datanya, nanti aku handle
     */
    public function ballots(Organization $organization)
    {
        $ballot = $organization->ballots()
            ->where('is_confirmed', 1)
            ->whereNotNull('confirmed_at')
            ->where('is_verified', 0)
            ->whereNull('verified_at')
            ->orderBy('confirmed_at', 'asc')
            ->first();

        if (!$ballot) {
            return redirect()->route('organizations.recap.result', ['organization' => $organization->code]);
        }

        return response()->json($ballot);
    }

    /**
     * Halaman untuk menampilkan hasil rekapitulasi.
     * (Sementara kosongi dulu, butuh konfirmasi requirements)
     */
    public function result(Organization $organization) {}
}
