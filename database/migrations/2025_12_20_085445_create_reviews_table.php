<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke user yang memberikan rating
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            // Menghubungkan ke produk yang diulas
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); 
            
            $table->integer('rating'); // Skala 1-5 sesuai desain Figma
            $table->text('comment');   // Isi ulasan pembeli
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};