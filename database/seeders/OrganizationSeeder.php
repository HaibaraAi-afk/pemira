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
        Organization::query()->create([
            "name" => "BEM",
            "logo" => "/bem.webp",
        ]);
        Organization::query()->create([
            "name" => "BLM",
            "logo" => "/blm.webp",
        ]);
        Organization::query()->create([
            "major" => "20",
            "name" => "HIMASIFO",
            "logo" => "/hmti.png",
        ]);
        Organization::query()->create([
            "major" => "30",
            "name" => "HIMASADA",
            "logo" => "/sada.png",
        ]);
        Organization::query()->create([
            "major" => "40",
            "name" => "HIMABISDI",
            "logo" => "/bisdi.png",
        ]);
    }
}
