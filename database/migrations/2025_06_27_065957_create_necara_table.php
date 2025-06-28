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
        Schema::create('necara', function (Blueprint $table) {
            $table->uuid('id')->primary()->autoIncrement();
            $table->date('tanggal');
            $table->unsignedInteger('debit_account_id');
            $table->unsignedInteger('credit_account_id');
            $table->decimal('debit_amount', 15, 2);
            $table->decimal('credit_amount', 15, 2);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->timestamps();

            $table->foreign('debit_account_id')->references('id')->on('chart_of_accounts');
            $table->foreign('credit_account_id')->references('id')->on('chart_of_accounts');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('necara');
    }
};
