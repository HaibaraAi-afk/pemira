<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bem = Organization::query()->create([
            "name" => "BEM FASILKOM",
            "logo" => "/bem.webp",
            "ordering" => 1,
        ]);
        $group = $bem->groups()->create([
            "name" => "Ketua & Wakil Ketua",
            "ordering" => 1,
        ]);
        $group->candidates()->create([
            "organization_id" => $bem->id,
            "name_1" => "Heaven",
            "vision" => "Mewujudkan kampus yang lebih baik",
            "mission" => "Membangun kampus yang lebih baik",
            "picture" => "/heaven.webp",
        ]);

        $blm = Organization::query()->create([
            "name" => "BLM FASILKOM",
            "logo" => "/blm.webp",
            "ordering" => 2,
        ]);
        $blm->groups()->create([
            "name" => "BLM HIMATIFA",
            "major" => 10,
            "min_candidates" => 2,
            "ordering" => 1,
        ]);
        $blm->groups()->create([
            "name" => "BLM HIMASIFO",
            "major" => 20,
            "min_candidates" => 2,
            "ordering" => 1,
        ]);
        $blm->groups()->create([
            "name" => "BLM HIMASADA",
            "major" => 30,
            "min_candidates" => 2,
            "ordering" => 1,
        ]);
        $blm->groups()->create([
            "name" => "BLM HIMABISDI",
            "major" => 30,
            "min_candidates" => 2,
            "ordering" => 1,
        ]);

        $sifo = Organization::query()->create([
            "name" => "HIMASIFO",
            "major" => 20,
            "logo" => "/hmti.png",
            "ordering" => 3,
        ]);
        $sifo->groups()->create([
            "name" => "BLJ 2024",
            "year" => 24,
            "major" => 20,
            "ordering" => 1,
        ]);
        $sifo->groups()->create([
            "name" => "BLJ 2023",
            "year" => 23,
            "major" => 20,
            "ordering" => 2,
        ]);
        $sifo->groups()->create([
            "name" => "BLJ 2022",
            "year" => 22,
            "major" => 20,
            "ordering" => 3,
        ]);
        $sifo->groups()->create([
            "name" => "Ketua & Wakil Ketua",
            "major" => 20,
            "ordering" => 4,
        ]);

        $sada = Organization::query()->create([
            "name" => "HIMASADA",
            "major" => 30,
            "logo" => "/sada.png",
            "ordering" => 4,
        ]);
        $sada->groups()->create([
            "name" => "BLJ 2024",
            "year" => 24,
            "major" => 30,
            "ordering" => 1,
        ]);
        $sada->groups()->create([
            "name" => "BLJ 2023",
            "year" => 23,
            "major" => 30,
            "ordering" => 2,
        ]);
        $sada->groups()->create([
            "name" => "BLJ 2022",
            "year" => 22,
            "major" => 30,
            "ordering" => 3,
        ]);
        $sada->groups()->create([
            "name" => "Ketua & Wakil Ketua",
            "major" => 30,
            "ordering" => 4,
        ]);

        $bisdi = Organization::query()->create([
            "name" => "HIMABISDI",
            "major" => 40,
            "logo" => "/bisdi.png",
            "ordering" => 5,
        ]);
        $bisdi->groups()->create([
            "name" => "BLJ 2024",
            "year" => 24,
            "major" => 40,
            "ordering" => 1,
        ]);
        $bisdi->groups()->create([
            "name" => "BLJ 2023",
            "year" => 23,
            "major" => 40,
            "ordering" => 2,
        ]);
        $bisdi->groups()->create([
            "name" => "BLJ 2022",
            "year" => 22,
            "major" => 40,
            "ordering" => 3,
        ]);
        $bisdi->groups()->create([
            "name" => "Ketua & Wakil Ketua",
            "major" => 40,
            "ordering" => 4,
        ]);
    }
}
