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
        Schema::create('file_biaya', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('biaya_id')->references('id')->on('biaya')->onDelete('cascade');
            $table->string('nama_file',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_biaya');
    }
};
