<?php

namespace Database\Seeders;

use App\Models\Whitelist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissingSifoWhitelistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Need to loop from 179 to 272
        $except = 185;
        for ($i = 179; $i <= 272; $i++) {
            if ($i === $except) {
                continue;
            }
            Whitelist::query()->create([
                "npm" => `24082010$i`,
            ]);
        }
    }
}
