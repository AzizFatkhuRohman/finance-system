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
        Schema::create('file_penjualan', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('penjualan_id')->references('id')->on('penjualan')->onDelete('cascade');
            $table->string('nama_file',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_penjualan');
    }
};
