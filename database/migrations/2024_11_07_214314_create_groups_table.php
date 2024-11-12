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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId("organization_id")
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->char("major", 2)->nullable();
            $table->char("year", 2)->nullable();
            $table->string("name");
            $table->integer("ordering");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
