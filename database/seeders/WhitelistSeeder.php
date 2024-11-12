<?php

namespace Database\Seeders;

use App\Models\Whitelist;
use Illuminate\Database\Seeder;

class WhitelistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (["22081010124", "22081010158", "22081010229", "23082010093", "24082010017"] as $npm) {
            Whitelist::query()->create(["npm" => $npm]);
        }
    }
}
