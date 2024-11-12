<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            "npm" => "22081010158",
            "email" => "2208101058@student.upnjatim.ac.id",
            "major" => "10",
            "year" => "22",
            "name" => "Heaven",
            "type" => "admin",
        ]);
        User::query()->create([
            "npm" => "22081010229",
            "email" => "22081010229@student.upnjatim.ac.id",
            "major" => "10",
            "year" => "22",
            "name" => "Gamar",
            "type" => "admin",
        ]);
        User::query()->create([
            "npm" => "23082010093",
            "email" => "23082010093@student.upnjatim.ac.id",
            "major" => "20",
            "year" => "23",
            "name" => "Hafidz",
            "type" => "admin",
        ]);
        User::query()->create([
            "npm" => "24082010017",
            "email" => "24082010017@student.upnjatim.ac.id",
            "major" => "20",
            "year" => "24",
            "name" => "Evelin",
            "type" => "admin",
        ]);
    }
}
