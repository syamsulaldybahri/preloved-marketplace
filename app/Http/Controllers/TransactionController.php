<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Tampilan Riwayat Transaksi
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())
                        ->with('product')
                        ->latest()
                        ->get();
        return view('transactions.index', compact('transactions'));
    }

    // Logika Klik Tombol Beli
    public function store($productId)
    {
        $product = Product::findOrFail($productId);

        Transaction::create([
            'user_id'     => Auth::id(),
            'product_id'  => $product->id,
            'total_price' => $product->price,
            'status'      => 'Diproses'
        ]);

        return redirect()->route('transactions.index')->with('success', 'Berhasil membeli!');
    }
}