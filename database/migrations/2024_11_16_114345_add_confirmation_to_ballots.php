<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ballots', function (Blueprint $table) {
            $table->boolean("is_confirmed")
                ->after("verification")
                ->default(false);
            $table->timestamp("confirmed_at")
                ->after("is_confirmed")
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ballots', function (Blueprint $table) {
            $table->dropColumn("is_confirmed");
            $table->dropColumn("confirmed_at");
        });
    }
};
