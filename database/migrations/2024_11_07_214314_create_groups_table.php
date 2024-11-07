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
            $table->char("org_code", 5)->unique();
            $table->foreign("org_code")
                ->references("code")
                ->on("organizations")
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string("name");
            $table->integer("ordering");
            $table->boolean("is_public")->default(false);
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
