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
        Schema::create('jurnal_umum', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('kategori',['penjualan','biaya']);
            $table->char('relational_id',36)->unique();
            $table->string('code_perusahaan');
            $table->string('no_account');
            $table->string('nama');
            $table->date('tgl');
            $table->decimal('debit',15,2);
            $table->decimal('kredit',15,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_umum');
    }
};