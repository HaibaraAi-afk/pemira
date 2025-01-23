<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyOrganization extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organization = Organization::query()->create([
            "name" => "BLM & BEM",
            "logo" => "/organizations/bem.jpg",
            "ordering" => 1,
        ]);

        $organization->groups()->create([
            "name" => "BLM Jurusan",
            "ordering" => 1,
        ])->candidates()->createMany([
            [
                "organization_id" => $organization->id,
                "name_1" => "Calon X",
                "vision" => "Visi Calon X",
                "mission" => "Misi Calon X",
                "picture" => "/kosong.jpg",
            ],
            [
                "organization_id" => $organization->id,
                "name_1" => "Calon X",
                "vision" => "Visi Calon X",
                "mission" => "Misi Calon X",
                "picture" => "/kosong.jpg",
            ],
            [
                "organization_id" => $organization->id,
                "name_1" => "Calon X",
                "vision" => "Visi Calon X",
                "mission" => "Misi Calon X",
                "picture" => "/kosong.jpg",
            ],
        ]);

        $organization->groups()->create([
            "name" => "Ketua & Wakil Ketua BEM",
            "ordering" => 2,
        ])->candidates()->createMany([
            [
                "organization_id" => $organization->id,
                "name_1" => "Calon X",
                "vision" => "Visi Calon X",
                "mission" => "Misi Calon X",
                "picture" => "/kosong.jpg",
            ],
            [
                "organization_id" => $organization->id,
                "name_1" => "Calon X",
                "vision" => "Visi Calon X",
                "mission" => "Misi Calon X",
                "picture" => "/kosong.jpg",
            ],
            [
                "organization_id" => $organization->id,
                "name_1" => "Calon X",
                "vision" => "Visi Calon X",
                "mission" => "Misi Calon X",
                "picture" => "/kosong.jpg",
            ],
        ]);
    }
}
