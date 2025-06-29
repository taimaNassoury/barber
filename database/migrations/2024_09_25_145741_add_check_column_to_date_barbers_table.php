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
        Schema::table('date_barbers', function (Blueprint $table) {
            $table->string('check')->default('not_check'); // Add the 'check' column

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('date_barbers', function (Blueprint $table) {
            $table->dropColumn('check'); // Drop the 'check' column if rolled back

        });
    }
};
