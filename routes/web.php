<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    
    // 1. DASHBOARD
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    // 2. MANAJEMEN PRODUK SAYA (PENJUAL)
    Route::get('/jual', [ProductController::class, 'create'])->name('products.create');
    Route::post('/jual', [ProductController::class, 'store'])->name('products.store');
    Route::get('/my-products', [ProductController::class, 'myProducts'])->name('products.mine');
    
    // Routes untuk Edit & Update Produk
    Route::get('/produk/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/produk/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // 3. DETAIL & KERANJANG (PEMBELI)
    Route::get('/produk/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/cart', [ProductController::class, 'viewCart'])->name('cart.index');
    Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('cart.remove');

    // 4. RIWAYAT TRANSAKSI
    Route::get('/riwayat-transaksi', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/beli/{productId}', [TransactionController::class, 'store'])->name('transactions.store');

    // 5. PROFIL & PENGATURAN
    // Halaman Utama Profil
    Route::get('/my-profile', function () {
        return view('profile.custom');
    })->name('profile.custom');

    // Halaman Edit Profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // Halaman Keamanan (Hanya Ganti Password)
    Route::get('/profile/keamanan', function () {
        return view('profile.password');
    })->name('profile.password');

    // --- TAMBAHAN ROUTE NOTIFIKASI ---
    Route::get('/notifications', function () {
        return view('notifications');
    })->name('notifications');
    // ---------------------------------

    // Proses Update (Logic Bawaan Laravel)
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';