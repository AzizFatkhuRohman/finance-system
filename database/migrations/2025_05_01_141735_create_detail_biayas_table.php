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
        Schema::create('detail_biaya', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('biaya_id')->references('id')->on('biaya');
            $table->foreignUuid('chart_of_account_id')->constrained();
            $table->string('item_biaya');
            $table->integer('qty');
            $table->decimal('harga');
            $table->decimal('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_biaya');
    }
};
