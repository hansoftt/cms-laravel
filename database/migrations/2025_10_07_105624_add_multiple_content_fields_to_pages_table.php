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
        Schema::table('pages', function (Blueprint $table) {
            // Remove the original content column
            $table->dropColumn('content');

            // Add multiple content columns
            $table->text('content1')->nullable();
            $table->text('content2')->nullable();
            $table->text('content3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // Remove multiple content columns
            $table->dropColumn(['content1', 'content2', 'content3']);

            // Restore the original content column
            $table->text('content');
        });
    }
};
