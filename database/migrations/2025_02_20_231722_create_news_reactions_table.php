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
        Schema::create('news_reactions', function (Blueprint $table) {
            $table->id();
            $table->integer('count');
            $table->foreignId('news_id')->nullable()->constrained('news', 'id')->onDelete('set null');
            $table->foreignId('reaction_id')->nullable()->constrained('reactions', 'id')->onDelete('set null');
            $table->timestamps();
            $table->unique(['news_id', 'reaction_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_reactions');
    }
};
