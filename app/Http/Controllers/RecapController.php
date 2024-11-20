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
    public function index(Organization $organization) {}

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
    public function start(Organization $organization) {}


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
    public function ballots(Organization $organization) {}

    /**
     * Halaman untuk menampilkan hasil rekapitulasi.
     * (Sementara kosongi dulu, butuh konfirmasi requirements)
     */
    public function result(Organization $organization) {}
}
