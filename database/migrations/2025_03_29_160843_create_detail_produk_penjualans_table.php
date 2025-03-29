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
        Schema::create('detail_produk_penjualan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('penjualan_id')->references('id')->on('penjualan');
            $table->foreignUuid('chart_of_account_id')->constrained();
            $table->foreignUuid('product_id')->constrained();
            $table->integer('qty');
            $table->decimal('total_harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_produk_penjualan');
    }
};
