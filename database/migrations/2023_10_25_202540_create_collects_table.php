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
        Schema::create('collects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('separation_id');
            $table->string('qr_code',255)->nullable();
            $table->string('collected_by')->nullable();
            $table->text('notes')->nullable();
            $table->string('img',255)->nullable();
            $table->timestamps();


            $table->foreign('separation_id')->references('id')->on('separations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collects');
    }
};
