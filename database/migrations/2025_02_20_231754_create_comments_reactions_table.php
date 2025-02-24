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
        Schema::create('comments_reactions', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->foreignId('comments_id')->nullable()->constrained('comments', 'id')->onDelete('set null');
            $table->foreignId('reaction_id')->nullable()->constrained('reactions', 'id')->onDelete('set null');
            $table->timestamps();
            $table->unique(['comments_id', 'reaction_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments_reactions');
    }
};
