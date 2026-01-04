<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User (Teman kamu) sebagai penjual
        $userId = DB::table('users')->insertGetId([
            'name' => 'Syamsul Aldy Bahri',
            'email' => 'syamsulaldybahri@gmail.com',
            'password' => Hash::make('1122334455'), // Password teman kamu
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Masukkan produk sepatu ke ID user teman kamu
        DB::table('products')->insert([
            [
                'user_id'     => $userId, 
                'name'        => 'Sepatu Converse Bekas',
                'price'       => 150000,
                'description' => 'Masih dalam kondisi sangat baik, hanya dipakai beberapa kali. Ukuran 42.',
                'condition'   => 'Grade A',
                'flaws'       => 'Tidak ada sobekan, hanya kotor sedikit di sol.',
                'image_path'  => 'sepatu_converse.jpg',
                'stock'       => 1,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}