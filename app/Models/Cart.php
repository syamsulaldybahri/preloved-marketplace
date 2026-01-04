<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    /**
     * Properti $fillable ini mengizinkan kolom-kolom di bawah 
     * untuk diisi secara massal (mass assignment).
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    /**
     * (Opsional) Relasi ke model Product agar kamu bisa 
     * mengambil data produk di halaman keranjang nanti.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}