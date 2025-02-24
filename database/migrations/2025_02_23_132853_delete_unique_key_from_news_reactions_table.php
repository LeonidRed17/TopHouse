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
        Schema::table('news_reactions', function (Blueprint $table) {
            $table->dropUnique(['news_id', 'reaction_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news_reactions', function (Blueprint $table) {
            $table->unique(['news_id', 'reaction_id']);
        });
    }
};
