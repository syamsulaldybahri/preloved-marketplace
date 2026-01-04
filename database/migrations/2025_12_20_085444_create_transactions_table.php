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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            // Pembeli (User yang login)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Produk yang dibeli
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            // Harga saat dibeli (supaya kalau harga produk berubah, riwayat tetap asli)
            $table->decimal('total_price', 12, 2);
            // Status: Diproses, Selesai, atau Batal
            $table->string('status')->default('Diproses'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};