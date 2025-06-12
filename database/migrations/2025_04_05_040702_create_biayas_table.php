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
        Schema::create('biaya', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('supplier_id')->constrained();
            $table->foreignUuid('user_id')->constrained();
            $table->date('tgl_transaksi');
            $table->foreignUuid('chart_of_account_id')->constrained();
            $table->string('kode_transaksi')->unique();
            $table->enum('status',['pending','paid'])->default('pending');
            // $table->decimal('pajak');
            // $table->decimal('diskon');
            $table->decimal('total_harga',15,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biaya');
    }
};
