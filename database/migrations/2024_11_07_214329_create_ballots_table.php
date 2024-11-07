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
        Schema::create('ballots', function (Blueprint $table) {
            $table->id();
            $table->char("org_code", 5);
            $table->foreign("org_code")
                ->references("code")
                ->on("organizations")
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->foreignId("user_id")
                ->constrained()
                ->restrictOnUpdate()
                ->restrictOnDelete();
            $table->string("ktm");
            $table->string("verification");
            $table->boolean("is_verified")->nullable();
            $table->timestamp("verified_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ballots');
    }
};
