<?php

namespace Database\Seeders;

use App\Models\Ballot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (range(1, 22) as $index) {
            Ballot::query()->create([
                "organization_id" => 1,
                "user_id" => $index % 4 + 1,
                "ktm" => "",
                "verification" => "",
            ]);
        }
    }
}
