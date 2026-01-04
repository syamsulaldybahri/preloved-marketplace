<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            $table->string('name');
            $table->integer('price');
            $table->text('description');
            
            // Perubahan di sini: Menggunakan integer agar bisa menyimpan angka 0-100
            // Ini untuk transparansi kualitas sesuai design thinking Anda
            $table->integer('condition')->comment('Persentase kondisi barang 0-100'); 
            
            $table->text('flaws')->nullable(); 
            $table->string('image_path'); 
            
            $table->integer('stock')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};