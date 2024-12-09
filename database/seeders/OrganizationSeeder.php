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
        $sifo = Organization::query()->create([
            "name" => "HIMASIFO",
            "major" => 20,
            "logo" => "/himasifo.png",
            "ordering" => 1,
        ]);

        $sifo->groups()->create([
            "name" => "BLJ 2024",
            "year" => 24,
            "major" => 20,
            "ordering" => 1,
        ])->candidates()->createMany([
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 1",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 2",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 3",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ]
        ]);

        $sifo->groups()->create([
            "name" => "BLJ 2023",
            "year" => 23,
            "major" => 20,
            "ordering" => 2,
        ])->candidates()->createMany([
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 1",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 2",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 3",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ]
        ]);

        $sifo->groups()->create([
            "name" => "BLJ 2022",
            "year" => 22,
            "major" => 20,
            "ordering" => 3,
        ])->candidates()->createMany([
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 1",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 2",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 3",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ]
        ]);

        $sifo->groups()->create([
            "name" => "Ketua & Wakil Ketua",
            "major" => 20,
            "ordering" => 4,
        ])->candidates()->createMany([
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 1A",
                "name_2" => "Candidate 1B",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 2A",
                "name_2" => "Candidate 2B",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ],
            [
                "organization_id" => $sifo->id,
                "name_1" => "Candidate 3A",
                "name_2" => "Candidate 3B",
                "vision" => "Mewujudkan kampus yang lebih baik",
                "mission" => "Membangun kampus yang lebih baik",
                "picture" => "/heaven.webp",
            ]
        ]);
    }
}
