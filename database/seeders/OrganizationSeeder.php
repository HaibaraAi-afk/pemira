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
        // $bem = Organization::query()->create([
        //     "name" => "BEM",
        //     "logo" => "/organizations/bem.jpg",
        //     "ordering" => 1,
        // ]);

        // $bem->groups()->create([
        //     "name" => "Ketua & Wakil Ketua",
        //     "ordering" => 1,
        // ])->candidates()->createMany([
        //     [
        //         "organization_id" => $bem->id,
        //         "name_1" => "Candidate 1A",
        //         "name_2" => "Candidate 1B",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $bem->id,
        //         "name_1" => "Candidate 2A",
        //         "name_2" => "Candidate 2B",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $bem->id,
        //         "name_1" => "Candidate 3A",
        //         "name_2" => "Candidate 3B",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ]
        // ]);

        // $blj = Organization::query()->create([
        //     "name" => "BLM",
        //     "logo" => "/organizations/blj.jpg",
        //     "ordering" => 2,
        // ]);

        // $blj->groups()->create([
        //     "name" => "BLM Informatika",
        //     "major" => 10,
        //     "ordering" => 1,
        // ])->candidates()->createMany([
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 1",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 2",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 3",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        // ]);

        // $blj->groups()->create([
        //     "name" => "BLM Sistem Informasi",
        //     "major" => 20,
        //     "ordering" => 1,
        // ])->candidates()->createMany([
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 1",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 2",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 3",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        // ]);

        // $blj->groups()->create([
        //     "name" => "BLM Sains Data",
        //     "major" => 30,
        //     "ordering" => 1,
        // ])->candidates()->createMany([
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 1",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 2",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 3",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        // ]);

        // $blj->groups()->create([
        //     "name" => "BLM Bisnis Digital",
        //     "major" => 40,
        //     "ordering" => 1,
        // ])->candidates()->createMany([
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 1",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 2",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        //     [
        //         "organization_id" => $blj->id,
        //         "name_1" => "Candidate 3",
        //         "vision" => "Mewujudkan kampus yang lebih baik",
        //         "mission" => "Membangun kampus yang lebih baik",
        //         "picture" => "/heaven.webp",
        //     ],
        // ]);

        // $createGroups = function (Organization $organization) {
        //     $organization->groups()->create([
        //         "name" => "BLJ 2024",
        //         "year" => 24,
        //         "major" => $organization->major,
        //         "ordering" => 1,
        //     ])->candidates()->createMany([
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 1",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 2",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 3",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ]
        //     ]);

        //     $organization->groups()->create([
        //         "name" => "BLJ 2023",
        //         "year" => 23,
        //         "major" => $organization->major,
        //         "ordering" => 1,
        //     ])->candidates()->createMany([
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 1",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 2",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 3",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ]
        //     ]);

        //     $organization->groups()->create([
        //         "name" => "BLJ 2022",
        //         "year" => 22,
        //         "major" => $organization->major,
        //         "ordering" => 1,
        //     ])->candidates()->createMany([
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 1",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 2",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 3",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ]
        //     ]);

        //     $organization->groups()->create([
        //         "name" => "Ketua & Wakil Ketua",
        //         "major" => $organization->major,
        //         "ordering" => 2,
        //     ])->candidates()->createMany([
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 1A",
        //             "name_2" => "Candidate 1B",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 2A",
        //             "name_2" => "Candidate 2B",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ],
        //         [
        //             "organization_id" => $organization->id,
        //             "name_1" => "Candidate 3A",
        //             "name_2" => "Candidate 3B",
        //             "vision" => "Mewujudkan kampus yang lebih baik",
        //             "mission" => "Membangun kampus yang lebih baik",
        //             "picture" => "/heaven.webp",
        //         ]
        //     ]);
        // };

        // $if = Organization::query()->create([
        //     "name" => "HIMATIFA",
        //     "major" => 10,
        //     "logo" => "/organizations/himatifa.jpg",
        //     "ordering" => 3,
        // ]);
        // $createGroups($if);

        // $sifo = Organization::query()->create([
        //     "name" => "HIMASIFO",
        //     "major" => 20,
        //     "logo" => "/organizations/himasifo.jpg",
        //     "ordering" => 4,
        // ]);
        // $createGroups($sifo);

        $sifo = Organization::query()->create([
            "name" => "HIMASIFO",
            "major" => 20,
            "logo" => "/organizations/himasifo.jpg",
            "ordering" => 4,
        ]);

        $sifo->groups()->create([
            "name" => "BLJ 2024",
            "year" => 24,
            "major" => $sifo->major,
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
    }
}
