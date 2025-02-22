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
        Schema::create('ballot_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("organization_id")
                ->constrained()
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->foreignId("group_id")
                ->constrained()
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->foreignId("ballot_id")
                ->constrained()
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->foreignId("candidate_id")
                ->constrained()
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ballot_details');
    }
};
