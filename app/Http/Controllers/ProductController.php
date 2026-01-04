<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        if ($request->has('condition') && $request->condition != '') {
            $query->where('condition', '>=', $request->condition);
        }
        $products = $query->latest()->get(); 
        return view('dashboard', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'condition' => 'required|integer|min:0|max:100', 
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'location' => 'required|string|max:100',
            'flaws' => 'nullable|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        Product::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'condition' => $request->condition,
            'image_path' => $imagePath,
            'location' => $request->location,
            'flaws' => $request->flaws ?? '-',
            'stock' => 1,
        ]);

        return redirect()->route('dashboard')->with('success', 'Produk berhasil dipasang!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Menampilkan Produk milik User yang sedang login
    public function myProducts()
    {
        $myProducts = Product::where('user_id', Auth::id())->latest()->get();
        return view('products.mine', compact('myProducts'));
    }

    // FUNGSI EDIT: Mengambil data lama untuk ditampilkan di Form
    public function edit($id)
    {
        $product = Product::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('products.edit', compact('product'));
    }

    // FUNGSI UPDATE: Menyimpan perubahan data ke Database
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'condition' => 'required|integer|min:0|max:100',
            'location' => 'required|string|max:100',
            'flaws' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Jika ada upload gambar baru
        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image_path = $imagePath;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'condition' => $request->condition,
            'location' => $request->location,
            'flaws' => $request->flaws ?? '-',
        ]);

        return redirect()->route('products.mine')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->user_id !== Auth::id()) return back();

        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->delete();
        return redirect()->route('products.mine')->with('success', 'Produk dihapus!');
    }

    public function addToCart($id)
    {
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $id)
                        ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1
            ]);
        }
        return redirect()->route('cart.index')->with('success', 'Berhasil ditambah ke keranjang!');
    }

    public function viewCart()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        return view('carts.index', compact('cartItems'));
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $cartItem->delete();
        return back()->with('success', 'Item dihapus.');
    }
}