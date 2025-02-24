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
        Schema::table('comments_reactions', function (Blueprint $table) {
            $table->renameColumn('comments_id', 'comment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments_reactions', function (Blueprint $table) {
            $table->renameColumn('comment_id', 'comments_id');
        });
    }
};
