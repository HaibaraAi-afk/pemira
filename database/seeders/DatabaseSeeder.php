<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Whitelist;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (["22081010124", "22081010158", "22081010229", "23082010093", "24082010017"] as $npm) {
            Whitelist::query()->create(["npm" => $npm]);
        }
        User::query()->create([
            "npm" => "22081010158",
            "email" => "2208101058@student.upnjatim.ac.id",
            "name" => "Heaven",
            "org_code" => "10",
            "type" => "admin",
        ]);
        User::query()->create([
            "npm" => "22081010229",
            "email" => "22081010229@student.upnjatim.ac.id",
            "name" => "Gamar",
            "org_code" => "10",
            "type" => "admin",
        ]);
        User::query()->create([
            "npm" => "23082010093",
            "email" => "23082010093@student.upnjatim.ac.id",
            "name" => "Hafidz",
            "org_code" => "20",
            "type" => "admin",
        ]);
        User::query()->create([
            "npm" => "24082010017",
            "email" => "24082010017@student.upnjatim.ac.id",
            "name" => "Evelin",
            "org_code" => "20",
            "type" => "admin",
        ]);
    }
}
