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
        Schema::table('separations', function (Blueprint $table) {
            $table->float('payment', 8,2);
            $table->float('merma', 8,2);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('separations', function (Blueprint $table) {
            $table->dropColumn('payment');
            $table->dropColumn('merma');

        });
    }
};
