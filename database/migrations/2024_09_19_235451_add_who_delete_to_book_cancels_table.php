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
        Schema::table('book_cancels', function (Blueprint $table) {
            $table->string('who_delete')->after('time');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_cancels', function (Blueprint $table) {
            $table->dropColumn('who_delete');
        });
    }
};
