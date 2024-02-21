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
        Schema::create('separations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->float('weight', 8,2);
            $table->bigInteger('num_bags')->nullable();
            $table->string('qr_code',255)->nullable();
            $table->enum('status', ['validated', 'not validated', 'collected', 'paid']);
            $table->string('validated_by')->nullable();
            $table->text('notes')->nullable();
            $table->string('img',255)->nullable();
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('separations');
    }
};
