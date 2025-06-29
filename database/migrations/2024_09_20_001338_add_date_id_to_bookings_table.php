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
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('date_id')->nullable()->after('id');

            // Assuming that the primary key of the DateBarber table is 'id'
            $table->foreign('date_id')->references('id')->on('date_barbers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['date_id']);

            // Then drop the date_id column
            $table->dropColumn('date_id');
        });
    }
};
